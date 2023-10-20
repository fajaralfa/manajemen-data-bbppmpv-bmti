<script>
    import Layout from '../../Components/Layout.svelte'
    import Table from '../../Components/Table.svelte'

    export let data
    console.log(data)
</script>

<Layout>
    <Table {data} />
</Layout>
