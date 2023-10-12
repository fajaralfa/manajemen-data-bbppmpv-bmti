<script context="module">
    export { default as layout } from '../Components/Layout.svelte'
    let data=[
        {nama:'vutri',kelas:'12',jurusan:'rpl',alamat:'cipari',hobi:'renang',pacar:'Holland',mantan:'zoro',sekolah:'stm',favwarna:'cream',
        favmakanan:'nasgor,seblak',favminuman:'ollate',favfilm:'marvel'},
    ]
    for(let i =0;i<100; i++){
        data.push(data[0])
    }
    console.log(data)
</script>
<div class="overflow-scroll"> 
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
</div>


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
    tr:hover{
        background-color: rgba(32, 213, 245, 0.5);
    }
</style>
