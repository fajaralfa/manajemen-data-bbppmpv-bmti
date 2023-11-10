<script>
    import { router } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    import Form from '../../Components/Users/Form.svelte'

    export let errors = {}

    function submit(input) {
        router.post('/user/add', input)
    }
</script>

<svelte:head>
    <title>Tambah User</title>
</svelte:head>
<Layout>
    <Form {submit} {errors} />
</Layout>
