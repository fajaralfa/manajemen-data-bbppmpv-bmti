<script context='module'>
    import Table from "../Components/Table.svelte";
    export { default as layout} from '../Components/Layout.svelte'
    let data =[
        {nama:'vutri',kelas:'12',jurusan:'rpl',pacar:'holland',hobi:'turu'}
    ]
</script>
<Table data={data}/>