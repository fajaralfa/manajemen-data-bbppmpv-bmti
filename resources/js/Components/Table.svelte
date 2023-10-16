<script>
    import DeleteIcon from '../../assets/DeleteIcon.svelte'
    import EditIcon from '../../assets/EditIcon.svelte'

    export let data = [{}]

    let editMode = false,
        deleteMode = false
</script>

<div class="flex px-3 py-2 bg-glass-dark">
    <div class="text-lg font-bold uppercase"><slot>Judul Tabel</slot></div>
    <form class="justify-self-end">
        <select name="" id="">
            <option value="">abcd</option>
            <option value="">abcd</option>
        </select>
        <select name="" id="">
            <option value="">abcd</option>
            <option value="">abcd</option>
        </select>
    </form>
    <div>
        <input type="checkbox" bind:checked={deleteMode} id="" />
        <input type="checkbox" bind:checked={editMode} id="" />
    </div>
</div>
<div class="overflow-x-scroll table-container bg-glass-dark">
    <table class="table">
        <thead class=" text-white uppercase sticky top-0 bg-glass-dark">
            <tr class="border-b-4">
                {#if deleteMode || editMode}
                    <th colspan={deleteMode && editMode ? '2' : '1'}>Aksi</th>
                {/if}
                {#each Object.entries(data[0]) as [key]}
                    <th>{key}</th>
                {/each}
            </tr>
        </thead>
        <tbody class="text-white">
            {#each data as row}
                <tr>
                    {#if deleteMode}
                        <tr>
                            <a href="#delete"><DeleteIcon /></a>
                        </tr>
                    {/if}
                    {#if editMode}
                        <td>
                            <a href="#edit"><EditIcon /></a>
                        </td>
                    {/if}
                    {#each Object.entries(row) as [key, val]}
                        <td>{val}</td>
                    {/each}
                </tr>
            {/each}
        </tbody>
    </table>
</div>

<style>
    tr,
    th,
    td {
        border-color: rgba(255, 255, 255, 0.3);
    }
    th {
        @apply text-center;
    }
    tbody tr:nth-child(odd) {
        background-color: rgba(200, 200, 200, 0.1);
    }
    tbody tr:nth-child(even) {
        background-color: rgba(0, 0, 0, 0.1);
    }
    .table-container {
        height: 84vh;
    }
</style>
