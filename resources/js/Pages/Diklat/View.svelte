<script>
    import Layout from '../../Components/Layout.svelte' 
    import Table from '../../Components/Table.svelte'
    
    // export let data 
    // console.log(data)
    let data = [
        {'ID':2, 'NAMA':'Miftah'}
    ]
</script>

<Layout>
    <Table {data} urlGroup='diklat'/>
</Layout>
