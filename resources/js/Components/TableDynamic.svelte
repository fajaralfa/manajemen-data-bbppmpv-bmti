<script>
    import { inertia } from '@inertiajs/svelte'
    import DeleteIcon from '../Assets/DeleteIcon.svelte'
    import EditIcon from '../Assets/EditIcon.svelte'
    import DeleteAlert from './DeleteAlert.svelte'

    export let data = []
    export let opts = {
        urlGroup: null,
        id: null,
        showedFields: [],
        imageFields: [],
    }

    let deleteAlertProps = {
        show: false,
        url: '',
    }

    function confirmAction(url) {
        deleteAlertProps.url = url
        deleteAlertProps.show = true
    }
</script>

<div class="w-full h-[92vh] overflow-x-scroll table-container bg-glass-dark">
    <div class="flex px-3 py-1 bg-glass-dark gap-20">
        <slot />
        <DeleteAlert showDeleteAlert={deleteAlertProps.show} deleteUrl={deleteAlertProps.url} />
    </div>
    {#if data.length === 0}
        <div class="text-xl text-center">Data Kosong!</div>
    {:else}
        <table class="table table-xs">
            <thead class="text-white uppercase sticky top-0 bg-black">
                <tr class="border-b-4">
                    {#each opts.showedFields as column}
                        <th>{column}</th>
                    {/each}
                    <th class="right-0 sticky bg-black">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-white">
                {#each data as row (row[opts.id])}
                    <tr>
                        {#each opts.showedFields as column}
                            {#if opts.imageFields.includes(column)}
                                <img src="/{opts.urlGroup}/photo/{row[column]}" alt="" />
                            {:else}
                                <td>{row[column]}</td>
                            {/if}
                        {/each}
                        <td class="right-0 sticky bg-black">
                            <button on:click={() => confirmAction(`/${opts.urlGroup}/${row[opts.id]}`)}>
                                <DeleteIcon />
                            </button>
                            <button use:inertia={{ href: `/${opts.urlGroup}/${row[opts.id]}/edit` }}><EditIcon /></button>
                        </td>
                    </tr>
                {/each}
            </tbody>
        </table>
    {/if}
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
</style>
