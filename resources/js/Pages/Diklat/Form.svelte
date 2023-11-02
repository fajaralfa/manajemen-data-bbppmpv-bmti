<script>
    import { router } from '@inertiajs/svelte'
    import Form from '../../Components/Diklat/Form.svelte'
    import Layout from '../../Components/Layout.svelte'

    export let errors = {}
    $: console.log(errors)

    function submit(input) {
        console.log(input)
        router.post('/diklat', input)
    }
</script>

<svelte:head>
    <title>Form Pendaftaran Peserta Diklat</title>
</svelte:head>
<Layout>
    <Form {submit} />
</Layout>
