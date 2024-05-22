<script>
    import { router, page } from '@inertiajs/svelte'
    import Layout from '@/Components/Layout.svelte'
    import Form from '@/Components/Prakerin/Form.svelte'

    export let input

    let idPrakerin = window.location.pathname.split('/')[3]

    function submit(input) {
        console.log(input)
        router.post(`/prakerin/edit/${idPrakerin}`, input)
    }
</script>

<svelte:head>
    <title>Form Edit Peserta Prakerin</title>
</svelte:head>
<Layout>
    <Form {submit} bind:input submitValue="Edit Data" />
</Layout>
