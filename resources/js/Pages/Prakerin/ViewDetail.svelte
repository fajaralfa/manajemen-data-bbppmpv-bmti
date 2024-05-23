<script>
    import { inertia } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    import DetailField from '../../Components/Prakerin/DetailField.svelte'
    export let data
</script>

<Layout>
    <div class="flex justify-center">
        <div class="my-10 bg-base-300 p-5 rounded-xl w-[50rem] flex flex-col gap-y-5 divide-y-2 divide-base-200">
            <a href={`/prakerin/${data.id}/export`} class="text-md text-center btn self-center">DOWNLOAD BIODATA </a>
            <DetailField label="Nama Lengkap" value={data['NAMA LENGKAP']} />
            <DetailField label="Nama Sekolah" value={data['NAMA SEKOLAH']} />
            <DetailField label="NIS/NIM" value={data['NIS/NIM']} />
            <DetailField label="Bidang Keahlian" value={data['BIDANG KEAHLIAN']} />
            <DetailField label="Program Keahlian" value={data['PROGRAM KEAHLIAN']} />
            <DetailField label="Tempat Lahir" value={data['TEMPAT LAHIR']} />
            <DetailField label="Tanggal Lahir" value={data['TANGGAL LAHIR']} />
            <DetailField label="Jenis Kelamin" value={data['JENIS KELAMIN']} />
            <DetailField label="Agama" value={data['AGAMA']} />
            <DetailField label="Alamat" value={data['ALAMAT LENGKAP']} />
            <DetailField label="No HP" value={data['NO HP']} />
            <DetailField label="Email" value={data['EMAIL']} />
            <DetailField label="FOTO" type="photo" value={data['FOTO']} />
            <DetailField label="tanggal Masuk" value={data['TANGGAL MASUK']} />
            <DetailField label="Tanggal Keluar" value={data['TANGGAL KELUAR']} />
            <DetailField label="Tempat/Departemen Pelaksanaan" value={data['TEMPAT/DEPARTEMEN PELAKSANAAN']} />
            <DetailField label="Nama Sekolah" value={data['NAMA SEKOLAH']} />
            <DetailField label="Kabupaten/Kota Sekolah" value={data['KABUPATEN/KOTA SEKOLAH']} />
            <DetailField label="Status Sekolah" value={data['STATUS SEKOLAH']} />
            <DetailField label="NSS" value={data['NSS']} />
            <DetailField label="Alamat Lengkap Sekolah " value={data['ALAMAT LENGKAP SEKOLAH']} />
            <DetailField label="Email Sekolah" value={data['POSEL SEKOLAH']} />
            <DetailField label="Hobi" value={data['HOBBY']} />
        </div>
    </div>
</Layout>
