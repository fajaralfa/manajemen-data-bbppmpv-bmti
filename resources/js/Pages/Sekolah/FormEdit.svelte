<script>
    import { router } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    import Form from '../../Components/Sekolah/Form.svelte'
    export let input

    let idSekolah = window.location.pathname.split('/')[2]
    function submit(input) {
        router.post(`/sekolah/${idSekolah}/edit`, input)
    }
</script>

<Layout>
    <Form {submit} {input} />
</Layout>
