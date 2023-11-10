<script>
    import Layout from '../../Components/Layout.svelte'
    import Table from '../../Components/Table.svelte'

    export let data
    export let message
    console.log(data)
    console.log(message)
</script>

<svelte:head>
    <title>Data User</title>
</svelte:head>
<Layout>
    <Table {data} urlGroup="user">Data User</Table>
</Layout>
