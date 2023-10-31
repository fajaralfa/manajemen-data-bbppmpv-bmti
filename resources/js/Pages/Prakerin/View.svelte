<script>
    import { router } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    import Table from '../../Components/Table.svelte'

    export let data
    console.log(data)

    let query = {
        nama: null,
        nis: null,
        tahun: null,
    }

    function find() {
        router.get('/prakerin', query)
    }
</script>

<Layout>
    <Table {data} urlGroup="prakerin">
        <div class="text-xl font-bold uppercase">Data Peserta Prakerin</div>
        <div>
            <form on:submit|preventDefault={find}>
                <div class="flex gap-x-4">
                    <div>Filter:</div>
                    <div>
                        <input type="text" name="nama" placeholder="Nama" bind:value={query.nama} />
                    </div>
                    <div>
                        <input type="text" name="nis" placeholder="NIS/NIM" bind:value={query.nis} />
                    </div>
                    <div>
                        <input type="text" name="tahun" placeholder="Tahun Masuk" bind:value={query.tahun} />
                    </div>
                    <div><button type="submit" class="bg-slate-700 rounded px-2 py-[0.1rem] text-sm">Cari</button></div>
                </div>
            </form>
        </div>
    </Table>
</Layout>
