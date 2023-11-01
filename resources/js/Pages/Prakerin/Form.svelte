<script>
    import { router, page } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    import Form from '../../Components/Prakerin/Form.svelte'
    function submit(input) {
        router.post('/prakerin', input)
    }

    export let errors
    console.log(errors)
    $: console.log($page.props.flash)
</script>

<svelte:head>
    <title>Form Pendaftaran Peserta Prakerin</title>
</svelte:head>
<Layout>
    <Form {submit} />
</Layout>
