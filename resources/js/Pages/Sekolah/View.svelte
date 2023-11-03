<script>
    import Layout from '../../Components/Layout.svelte'
    import Table from '../../Components/Table.svelte'

    export let data
    export let message
    console.log(data)
    console.log(message)
</script>

<svelte:head>
    <title>Data Sekolah</title>
</svelte:head>
<Layout>
    <Table {data} urlGroup="sekolah">Data Sekolah</Table>
</Layout>
