<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrakerinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'NAMA_LENGKAP' => ['required'],
            'NAMA_SEKOLAH' => ['required'],
            'NIS/NIM' => ['required', 'numeric'],
            'BIDANG_KEAHLIAN' => ['required'],
            'PROGRAM_KEAHLIAN' => ['required'],
            'KOMPETENSI_KEAHLIAN' => ['required'],
            'TEMPAT_LAHIR' => ['required'],
            'TANGGAL_LAHIR' => ['required', 'date_format:Y-m-d'],
            'JENIS_KELAMIN' => ['required'],
            'AGAMA' => ['required'],
            'ALAMAT_LENGKAP' => ['required'],
            'NO_HP' => ['required'],
            'EMAIL' => ['required'],
            'FOTO' => ['required'],
            'TANGGAL_MASUK' => ['required', 'date_format:Y-m-d'],
            'TANGGAL_KELUAR' => ['required', 'date_format:Y-m-d'],
            'TEMPAT/DEPARTEMEN_PELAKSANAAN' => ['required'],
            'NAMA_SEKOLAH' => ['required'],
            'KABUPATEN/KOTA_SEKOLAH' => ['required'],
            'STATUS_SEKOLAH' => ['required'],
            'NSS' => [],
            'ALAMAT_LENGKAP_SEKOLAH' => ['required'],
            'POSEL_SEKOLAH' => ['required'],
            'HOBBY' => ['required'],
        ];
    }
}
