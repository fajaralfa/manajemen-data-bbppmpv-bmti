<script>
    import Form from '../../Components/Inventaris/Form.svelte'
    import Layout from '../../Components/Layout.svelte'
    import { router, page } from '@inertiajs/svelte'

    export let input

    let idInventaris = window.location.pathname.split('/')[2]

    function submit(input) {
        router.post(`/inventaris/${idInventaris}/edit`, input)
    }
</script>

<Layout>
    <Form {submit} {input} />
</Layout>
