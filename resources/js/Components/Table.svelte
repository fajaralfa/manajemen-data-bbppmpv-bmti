<script>
    import { inertia, router } from '@inertiajs/svelte'
    import DeleteIcon from '../../assets/DeleteIcon.svelte'
    import EditIcon from '../../assets/EditIcon.svelte'
    import DeleteAlert from './DeleteAlert.svelte'

    export let urlGroup
    export let data = []

    console.log(data)

    let deleteAlertProps = {
        showDeleteAlert: false,
        deleteUrl: '',
    }

    function deleteConfirm(id) {
        deleteAlertProps.showDeleteAlert = true
        deleteAlertProps.deleteUrl = `/${urlGroup}/${id}`
    }
</script>

<DeleteAlert {...deleteAlertProps} />

<div class="flex px-3 py-1 bg-glass-dark gap-20">
    <div class="text-lg font-bold uppercase flex-grow"><slot>Table</slot></div>
</div>
{#if data.length == 0}
    <div class="text-xl text-center">Data Kosong!</div>
{:else}
    <div class="overflow-x-scroll table-container bg-glass-dark">
        <table class="table table-xs">
            <thead class=" text-white uppercase sticky top-0 bg-black">
                <tr class="border-b-4">
                    {#each Object.entries(data[0]) as [key]}
                        <th>{key}</th>
                    {/each}
                    <th class="right-0 sticky bg-black">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-white">
                {#each data as row}
                    <tr>
                        {#each Object.entries(row) as [key, val]}
                            {#if key !== 'FOTO'}
                                <td>{val}</td>
                            {:else}
                                <td
                                    ><img
                                        src="/{urlGroup}/photo/{row['FOTO']?.split('/')[1] ?? '0'}"
                                        alt="Pas Foto"
                                        srcset=""
                                    /></td
                                >
                            {/if}
                        {/each}
                        <td class="right-0 sticky bg-glass-dark">
                            <button class="p-4" on:click={() => deleteConfirm(row['id'])}><DeleteIcon /></button>
                            <button class="p-4" use:inertia={{ href: `/${urlGroup}/${row['id']}/edit` }}><EditIcon /></button>
                        </td>
                    </tr>
                {/each}
            </tbody>
        </table>
    </div>
{/if}

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
