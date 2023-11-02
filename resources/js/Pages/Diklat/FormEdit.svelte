<script>
    import { router } from '@inertiajs/svelte'
    import Form from '../../Components/Diklat/Form.svelte'
    import Layout from '../../Components/Layout.svelte'

    export let input
    export let errors = {}

    let idDiklat = window.location.pathname.split('/')[2]

    function submit(input) {
        console.log(input)
        router.post(`/diklat/${idDiklat}/edit`, input)
    }
</script>

<svelte:head>
    <title>Form Edit Peserta Diklat</title>
</svelte:head>
<Layout>
    <Form {input} {submit} {errors} />
</Layout>
