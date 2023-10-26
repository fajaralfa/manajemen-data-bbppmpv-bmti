<script>
    import { router, page } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    import Form from '../../Components/Prakerin/Form.svelte'

    export let input

    let idDiklat = window.location.pathname.split('/')[2]

    function submit(input) {
        console.log(input)
        router.put(`/prakerin/${idDiklat}`, input)
    }

    export let errors, data
    $: console.log(errors, data)
</script>

<Layout>
    <Form {submit} bind:input />
</Layout>
