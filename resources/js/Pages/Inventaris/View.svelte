<script>
    import Layout from '../../Components/Layout.svelte'
    import Table from '../../Components/Table.svelte'

    export let data
</script>

<Layout>
    <Table {data} urlGroup="inventaris">Data Inventaris</Table>
</Layout>
