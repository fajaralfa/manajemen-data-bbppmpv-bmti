<script>
    import { router, page } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'

    export let errors
    console.log(errors)

    let input = {
        file: null,
    }

    function importFile() {
        router.post('/diklat/import', input)
    }
</script>

<svelte:head>
    <title>Import Data Peserta Diklat</title>
</svelte:head>
<Layout>
    <div class="h-[91vh] grid place-items-center">
        <div class="card w-96 h-64 bg-glass-dark">
            <div class="card-body">
                <div class="text-center">Import data peserta diklat dan sekolah dari Spreadsheet.</div>
                <div class="text-center">
                    <a href="/storage/template-spreadsheet-diklat.xlsx" class="text-blue-600 underline">Lihat Format</a>
                </div>
                <form class="mt-6" on:submit|preventDefault={importFile}>
                    <div class="flex flex-col gap-y-4 items-center">
                        <input type="file" on:input={(e) => (input.file = e.target.files[0])} />
                        <button type="submit" class="rounded bg-slate-800 px-2 py-1 text-xl uppercase">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</Layout>
