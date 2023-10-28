<script>
    import { router } from '@inertiajs/svelte'
    import Form from '../../Components/Diklat/Form.svelte'
    import Layout from '../../Components/Layout.svelte'

    export let input
    export let errors = {}
    $: console.log(errors)

    let idDiklat = window.location.pathname.split('/')[2]

    function submit(input) {
        console.log(input)
        router.post(`/diklat/${idDiklat}/edit`, input)
    }
</script>

<Layout>
    <Form {input} {submit} />
</Layout>
