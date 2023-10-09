<script context="module">
    export { default as layout } from '../Components/Layout.svelte'
    let data=[
        {nama:'vutri',kelas:'12',jurusan:'rpl',alamat:'cipari',hobi:'renang'},
        {nama:'miftah',kelas:'12',jurusan:'rpl',alamat:'petakan',hobi:'voly'},
        {nama:'alfa',kelas:'12',jurusan:'rpl',alamat:'wangun',hobi:'ngoding'},
        {nama:'holland',kelas:'12',jurusan:'rpl',alamat:'cipari',hobi:'akting'},
    ]
    console.log(data)
</script>

<table class="border-black border">
    <tr>
        {#each Object.entries(data[0]) as [key, value] }
        <th>
            {key}
        </th>
    {/each}
    </tr>
    {#each data as obj }
        <tr >
            {#each Object.entries(obj) as [key, value] }
                <td class="px-10">
                    {value}
                </td>
            {/each}
        </tr>
    {/each}
</table>

<style>
    table tr th{
        background-color: rgba(90, 87, 87, 0.5);
    }
    th,td{
        @apply border border-black;
    }
    tr:nth-child(odd){
        background-color: rgba(94, 92, 92, 0.5);
    }
    tr:nth-child(even){
        background-color: rgba(200, 200, 200, 0.5);
    }
</style>
