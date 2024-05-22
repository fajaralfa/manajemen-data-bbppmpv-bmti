<script>
    import { router, useForm } from '@inertiajs/svelte'
    import Layout from '@/Components/Layout.svelte'
    import Table from '@/Components/Shared/Table.svelte'

    export let data

    const columns = {
        'NAMA LENGKAP': 'NAMA LENGKAP',
        'NIS/NIM': 'NIS/NIM',
        'BIDANG KEAHLIAN': 'BIDANG KEAHLIAN',
        'PROGRAM KEAHLIAN': 'PROGRAM KEAHLIAN',
        'KOMPETENSI KEAHLIAN': 'KOMPETENSI KEAHLIAN',
        'TEMPAT LAHIR': 'TEMPAT LAHIR',
        'TANGGAL LAHIR': 'TANGGAL LAHIR',
        'JENIS KELAMIN': 'JENIS KELAMIN',
        AGAMA: 'AGAMA',
        'ALAMAT LENGKAP': 'ALAMAT LENGKAP',
        'NO HP': 'NO HP',
        EMAIL: 'EMAIL',
        FOTO: {type: 'img', label: 'FOTO',},
        'TANGGAL MASUK': 'TANGGAL MASUK',
        'TANGGAL KELUAR': 'TANGGAL KELUAR',
        'TEMPAT/DEPARTEMEN PELAKSANAAN': 'TEMPAT/DEPARTEMEN PELAKSANAAN',
        'NAMA SEKOLAH': 'NAMA SEKOLAH',
        'KABUPATEN/KOTA SEKOLAH': 'KABUPATEN/KOTA SEKOLAH',
        'STATUS SEKOLAH': 'STATUS SEKOLAH',
        NSS: 'NSS',
        'ALAMAT LENGKAP SEKOLAH': 'ALAMAT LENGKAP SEKOLAH',
        'POSEL SEKOLAH': 'POSEL SEKOLAH',
        HOBBY: 'HOBBY',
    }

    let filterForm = useForm({
        nama: null,
        nis: null,
        tahun: null,
    })

</script>

<svelte:head>
    <title>Peserta Prakerin</title>
</svelte:head>
<Layout>
    <div class="w-[100vw] h-[92vh] overflow-x-scroll table-container bg-base-200">
        <div class="text-xl font-bold uppercase sticky left-0">Data Peserta Prakerin</div>
        <div class="sticky left-0">
            <form on:submit|preventDefault={() => $filterForm.get('/prakerin')}>
                <div class="flex gap-x-4 items-stretch">
                    <span>Filter:</span>
                    <input type="text" name="nama" placeholder="Nama" bind:value={$filterForm.nama} class="input input-bordered max-h-7" />
                    <input type="text" name="nis" placeholder="NIS/NIM" bind:value={$filterForm.nis} class="input input-bordered max-h-7" />
                    <input type="text" name="tahun" placeholder="Tahun Masuk" bind:value={$filterForm.tahun} class="input input-bordered max-h-7" />
                    <button type="submit" class="btn-primary rounded px-3">Cari</button>
                </div>
            </form>
        </div>
        <Table {data} {columns} url={{img: '/prakerin/photo', delete: '/prakerin', edit: '/prakerin/edit'}} />
    </div>
</Layout>
