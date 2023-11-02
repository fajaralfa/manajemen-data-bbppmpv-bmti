<script>
    import { router, page } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    import Form from '../../Components/Prakerin/Form.svelte'

    export let errors = {}

    function submit(input) {
        router.post('/prakerin', input)
    }
</script>

<svelte:head>
    <title>Form Pendaftaran Peserta Prakerin</title>
</svelte:head>
<Layout>
    <Form {submit} {errors} />
</Layout>
