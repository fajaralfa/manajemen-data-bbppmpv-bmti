<script>
    import { router } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    import Form from '../../Components/Sekolah/Form.svelte'
    function submit(input) {
        router.post('/sekolah', input)
    }
</script>

<svelte:head>
    <title>Form Pendaftaran Data Sekolah</title>
</svelte:head>
<Layout>
    <Form {submit} />
</Layout>
