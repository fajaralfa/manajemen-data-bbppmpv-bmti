<script>
    import { router } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    import Table from '../../Components/Table.svelte'

    export let data
    export let message

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
    <Table {data} urlGroup="diklat">
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
    </Table>
</Layout>
