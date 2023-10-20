<script>
    import Layout from '../../Components/Layout.svelte' 
    import Table from '../../Components/Table.svelte'
    
    export let data 
    export let message = null
    console.log(data)
</script>

<Layout>
    <div class="bg-red-600">{message}</div>
    <Table {data}/>
</Layout>
