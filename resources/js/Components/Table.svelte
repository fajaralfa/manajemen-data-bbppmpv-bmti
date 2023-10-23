<script>
    import { inertia, router } from '@inertiajs/svelte'
    import DeleteIcon from '../../assets/DeleteIcon.svelte'
    import EditIcon from '../../assets/EditIcon.svelte'
    import DeleteAlert from './DeleteAlert.svelte'

    export let urlGroup
    export let data = [{}]

    let showDeleteAlert = false
    let deleteUrl = ''

    function deleteConfirm(id) {
        showDeleteAlert = true
        deleteUrl = `/${urlGroup}/${id}`
    }

</script>

<DeleteAlert bind:deleteUrl bind:showDeleteAlert/>

<div class="flex px-3 py-1 bg-glass-dark gap-20">
    <div class="text-lg font-bold uppercase flex-grow"><slot>Tabel Diklat</slot></div>
</div>
<div class="overflow-x-scroll table-container bg-glass-dark">
    <table class="table">
        <thead class=" text-white uppercase sticky top-0 bg-black">
            <tr class="border-b-4">
                <th colspan="2">Aksi</th>
                {#each Object.entries(data[0]) as [key]}
                    <th>{key}</th>
                {/each}
            </tr>
        </thead>
        <tbody class="text-white">
            {#each data as row}
                <tr>
                    <td class="left-0 sticky bg-black">
                        <button class="p-4" on:click={() => deleteConfirm(row['ID'])}><DeleteIcon /></button>
                        <button href="/{urlGroup}/{row['ID']}/edit" class="p-4" use:inertia as="button"><EditIcon /></button>
                    </td>
                    {#each Object.entries(row) as [key, val]}
                        {#if key !== 'FOTO'}
                            <td>{val}</td>
                        {:else}
                            <td><img src="/diklat/photo/{row['FOTO']?.split('/')[1] ?? '0'}" alt="Pas Foto" srcset="" /></td>
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
