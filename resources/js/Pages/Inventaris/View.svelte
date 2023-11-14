<script>
    import { router } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    import Table from '../../Components/Table.svelte'

    export let data

    let query = {
        Nama_Peralatan: null,
        Kategori: null,
        Waktu_Pengadaan: null,
    }

    function find() {
        router.get('/inventaris', query)
    }
</script>

<Layout>
    <Table {data} urlGroup="inventaris" imageFields={['Gambar']}>
        <div class="text-xl font-bold uppercase">Data Inventaris</div>
        <div>
            <form on:submit|preventDefault={find}>
                <div class="flex gap-x-4">
                    <div>Filter:</div>
                    <div>
                        <input type="number" bind:value={query.Waktu_Pengadaan} placeholder="Tahun Pengadaan" />
                    </div>
                    <div>
                        <select name="kategori" bind:value={query.Kategori}>
                            <option value={null}>Kategori</option>
                            <option value={null}>Tidak Berkategori</option>
                            <option value="man">abcd</option>
                        </select>
                    </div>
                    <div>
                        <input type="text" name="nama_peralatan" placeholder="Nama Peralatan" bind:value={query.Nama_Peralatan} />
                    </div>
                    <div><button type="submit" class="bg-slate-700 rounded px-2 py-[0.1rem] text-sm">Cari</button></div>
                </div>
            </form>
        </div>
    </Table>
</Layout>
