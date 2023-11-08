<script>
    import { router } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    import Form from '../../Components/Sekolah/Form.svelte'
    export let input
    export let errors = {}

    let idSekolah = window.location.pathname.split('/')[2]
    function submit(input) {
        router.post(`/sekolah/${idSekolah}/edit`, input)
    }
    $: console.log(input)
</script>

<svelte:head>
    <title>Form Edit Data Sekolah</title>
</svelte:head>
<Layout>
    <Form {submit} {input} {errors} />
</Layout>
