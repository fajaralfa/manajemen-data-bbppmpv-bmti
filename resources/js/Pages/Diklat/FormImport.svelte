<script>
    import { router, page } from "@inertiajs/svelte"
    import Layout from "../../Components/Layout.svelte";

    export let errors
    console.log(errors)

    let input = {
        'file': null
    }

    function importFile() {
        router.post('/diklat/import', input)
    }
</script>

<Layout>
    <form on:submit|preventDefault={importFile}>
        <input type="file" on:input={(e) => input.file = e.target.files[0]}>
        <button type="submit">Import</button>
    </form>
</Layout>