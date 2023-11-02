<script>
    import Form from '../../Components/Inventaris/Form.svelte'
    import Layout from '../../Components/Layout.svelte'
    import { router, page } from '@inertiajs/svelte'

    function submit(input) {
        router.post('/inventaris', input)
    }

    export let errors = {}
</script>

<Layout>
    <Form {submit} {errors} />
</Layout>
