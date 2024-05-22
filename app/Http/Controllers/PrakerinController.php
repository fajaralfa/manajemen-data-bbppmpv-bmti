<?php

namespace App\Http\Controllers;

use App\Facades\SpreadsheetFacade;
use App\Helper\Converter;
use App\Helper\Helper;
use App\Http\Requests\EditPrakerinRequest;
use App\Http\Requests\StorePrakerinRequest;
use App\Repository\PrakerinRepository;
use App\Models\Prakerin;
use Illuminate\Database\UniqueConstraintViolationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

class PrakerinController extends Controller
{
    public function __construct(
        private PrakerinRepository $prakerinRepository,
        private Helper $helper,
        private Xlsx $xlsx,
        private Converter $converter,
        private SpreadsheetFacade $spreadsheetFacade,
    ) {
    }

    public function view()
    {
        $nama = request()->query('nama');
        $nis = request()->query('nis');
        $tahun = request()->query('tahun');

        $data = $this->prakerinRepository->filterNamaNisTahun($nama, $nis, $tahun);
        
        return inertia('Prakerin/View', ['data' => $data]);
    }

    public function viewDetail(string $id)
    {
        return inertia('Prakerin/ViewDetail', [
            'data' => Prakerin::where('id', $id)
        ]);
    }

    public function store(StorePrakerinRequest $request)
    {
        $input = $request->all();
        $input = $this->helper->mapRequestToTable($input);
        $photoPath = request()->file('FOTO')->store('foto-prakerin');
        $input['FOTO'] = $photoPath;

        try {
            Prakerin::create($input);
        } catch (UniqueConstraintViolationException $e) {
            return redirect()->back()->withErrors(['NIS/NIM' => 'NIS/NIM sudah dipakai']);
        }

        return redirect('/prakerin');
    }

    public function getPhoto(string $path)
    {
        $path = Storage::path('foto-prakerin/' . $path);
        try {
            return response()->file($path, ['content-type', 'image/jpeg']);
        } catch (FileNotFoundException) {
            return response("File '$path' Not Found", 404);
        }
    }

    public function delete(string $id)
    {
        Prakerin::destroy($id);
        return redirect('/prakerin');
    }

    public function editPage(string $id)
    {
        $data = Prakerin::whereId($id)->first();
        $input = $this->helper->mapTableToRequest($data);

        return inertia('Prakerin/FormEdit', ['input' => $input]);
    }

    public function edit(EditPrakerinRequest $request, string $id)
    {
        $input = $request->all();

        $prakerin = Prakerin::find($id);

        if ($request->hasFile('FOTO')) {
            Storage::delete($prakerin->FOTO);
            $input['FOTO'] = $request->file('FOTO')->store('foto-prakerin');
        }

        $input = $this->helper->mapRequestToTable($input);

        try {
            $prakerin->update($input);
        } catch (UniqueConstraintViolationException $e) {
            return redirect()->back()->withErrors(['NIS/NIM' => 'NIS/NIM sudah dipakai']);
        }
        return redirect('/prakerin');
    }

    public function export(string $id)
    {
        $prakerin = Prakerin::find($id);
        $processor = new TemplateProcessor(Storage::path('template-document-biodata-prakerin.docx'));

        $processor->setValues($prakerin->except('FOTO')->toArray());

        if (str_contains($prakerin['FOTO'], '/') && Storage::exists($prakerin['FOTO'])) {
            $processor->setImageValue('FOTO', Storage::path($prakerin['FOTO']));
        } else {
            $processor->setValue('FOTO', 'Tidak Ada Foto');
        }

        if (!Storage::directoryExists('prakerin/documents'))
            Storage::makeDirectory('prakerin/documents');

        $filename = 'prakerin/documents/Biodata ' . $prakerin['NAMA LENGKAP'] . ' ' . $prakerin['NAMA SEKOLAH'] . '.docx';
        $processor->saveAs(Storage::path($filename));

        return Storage::download($filename);
    }

    public function import()
    {
        request()->validate(['file' => 'required']);
        $filePath = request()->file('file')->store('prakerin/spreadsheet');

        $dataAssoc = $this->spreadsheetFacade->excelToCollectionAssoc($filePath);

        $dataAssoc = $dataAssoc->mapWithKeys(function ($item, $key) {
            $item['TANGGAL LAHIR'] = $this->converter->formatDate($item['TANGGAL LAHIR']);
            $item['TANGGAL MASUK'] = $this->converter->formatDate($item['TANGGAL MASUK']);
            $item['TANGGAL KELUAR'] = $this->converter->formatDate($item['TANGGAL KELUAR']);

            return [$key => $item];
        })->toArray();

        Prakerin::insertOrIgnore($dataAssoc);

        return redirect('/prakerin');
    }
}
