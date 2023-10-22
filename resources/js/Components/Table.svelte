<script>
    import { inertia } from '@inertiajs/svelte'
    import DeleteIcon from '../../assets/DeleteIcon.svelte'
    import EditIcon from '../../assets/EditIcon.svelte'

    export let urlGroup
    export let data = [{}]

    let editMode = false,
        deleteMode = false

    console.log(data)
</script>

<div class="flex px-3 py-1 bg-glass-dark gap-20">
    <div class="text-lg font-bold uppercase flex-grow"><slot>Judul Tabel</slot></div>
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
                        <td>
                            <a href="/{urlGroup}/{row['ID']}" use:inertia={{method: 'put'}} as='button'><DeleteIcon /></a>
                        </td>
                    {/if}
                    {#if editMode}
                        <td>
                            <a href="/{urlGroup}/{row['ID']}/edit" use:inertia={{method: 'delete'}} as='button'><EditIcon /></a>
                        </td>
                    {/if}
                    {#each Object.entries(row) as [key, val]}
                        {#if key !== 'FOTO'}
                            <td>{val}</td>
                        {:else}
                            <td><img src="/diklat/photo/{row['FOTO']?.split('/')[1] ?? '0'}" alt="Pas Foto" srcset=""></td>
                        {/if}
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
        height: 83vh;
    }
</style>
