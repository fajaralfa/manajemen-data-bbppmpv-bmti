<script>
    import { router } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    import TableDynamic from '../../Components/TableDynamic.svelte'

    export let data

    export let query = {
        nama: null,
        tahun: null,
    }

    function find() {
        router.get('/diklat', query)
    }
</script>

<svelte:head>
    <title>Peserta Diklat</title>
</svelte:head>
<Layout>
    <TableDynamic {data} opts={{ urlGroup: 'diklat', id: 'ID', showedFields: [
                'NIK', 'NUPTK', 'NIP', 'NO UKG', 'NAMA LENGKAP',
                'TEMPAT LAHIR', 'TANGGAL LAHIR', 'USIA', 'KELAMIN',
                'JABATAN', 'GOLONGAN', 'NOMOR HP', 'EMAIL', 'KOMPETENSI KEAHLIAN',
                'PROGRAM KEAHLIAN', 'BIDANG KEAHLIAN', 'MAPEL AJAR',
                'KELAS AJAR', 'NPSN SEKOLAH', 'KELAS', 'NAMA DIKLAT',
                'TANGGAL PERIODE AWAL', 'TANGGAL PERIODE AKHIR', 'TEMPAT DIKLAT',
                'RIWAYAT DIKLAT', 'FOTO', 'KETERANGAN',
            ], imageFields: ['FOTO']}}>
        <div class="text-xl font-bold uppercase">Data Peserta Diklat</div>
        <div>
            <form on:submit|preventDefault={find}>
                <div class="flex gap-x-4">
                    <div>Filter:</div>
                    <div>
                        <input type="text" name="nama" placeholder="Nama Lengkap" bind:value={query.nama} />
                    </div>
                    <div>
                        <input type="text" name="tahun" placeholder="Tahun" bind:value={query.tahun} />
                    </div>
                    <div><button type="submit" class="bg-slate-700 rounded px-2 py-[0.1rem] text-sm">Cari</button></div>
                </div>
            </form>
        </div>
    </TableDynamic>
</Layout>
