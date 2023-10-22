<script>
    import Layout from '../../Components/Layout.svelte'
    import Table from '../../Components/Table.svelte'

    export let data
    export let message
    console.log(data)
    console.log(message)
</script>

<Layout>
    <Table {data} />
</Layout>
