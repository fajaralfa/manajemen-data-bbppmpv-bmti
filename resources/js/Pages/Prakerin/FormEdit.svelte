<script>
    import { router, page } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    import Form from '../../Components/Prakerin/Form.svelte'

    export let input

    let idPrakerin = window.location.pathname.split('/')[2]

    function submit(input) {
        console.log(input)
        router.post(`/prakerin/${idPrakerin}/edit`, input)
    }

    export let errors, data
    $: console.log(errors, data)
</script>

<svelte:head>
    <title>Form Edit Peserta Prakerin</title>
</svelte:head>
<Layout>
    <Form {submit} bind:input />
</Layout>
