<script>
    import { router, page } from '@inertiajs/svelte'
    import Layout from '@/Components/Layout.svelte'

    let input = {
        file: null,
    }

    function importFile() {
        router.post('/prakerin/import', input)
    }
</script>

<svelte:head>
    <title>Import Data Peserta Prakerin</title>
</svelte:head>
<Layout>
    <div class="h-[91vh] grid place-items-center">
        <div class="card w-96 h-64">
            <div class="card-body">
                <div class="text-center">Import data peserta Prakerin dari Spreadsheet.</div>
                <div class="text-center">
                    <a href="/img/template-spreadsheet-prakerin.xlsx" class="text-blue-600 underline">Lihat Format</a>
                </div>
                <form class="mt-6" on:submit|preventDefault={importFile}>
                    <div class="flex flex-col gap-y-4 items-center">
                        <input type="file" on:input={(e) => (input.file = e.target.files[0])} class="file-input file-input-bordered" />
                        <button type="submit" class="btn btn-primary text-xl uppercase">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</Layout>
