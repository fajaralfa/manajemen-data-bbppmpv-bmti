<script>
    import { inertia, page } from '@inertiajs/svelte'
    import DeleteIcon from '../Assets/DeleteIcon.svelte'
    import EditIcon from '../Assets/EditIcon.svelte'
    import DeleteAlert from './DeleteAlert.svelte'
    import DetailIcon from '../Assets/DetailIcon.svelte'

    export let urlGroup
    export let data = []
    export let imageFields = ['FOTO']
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

<div class="w-full h-[92vh] overflow-x-scroll table-container bg-glass-dark">
    <div class="flex px-3 py-1 bg-glass-dark gap-20">
        <slot />
        <DeleteAlert {...deleteAlertProps} />
    </div>
    {#if data.length == 0}
        <div class="text-xl text-center">Data Kosong!</div>
    {:else}
        <table class="table table-xs">
            <thead class="text-white uppercase sticky top-0 bg-black">
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
                            <td>
                                {#if imageFields.includes(key)}
                                    <img src="/{urlGroup}/photo/{row[key]?.split('/')[1] ?? '0'}" alt="Foto" class="h-12" />
                                {:else}
                                    {val}
                                {/if}
                            </td>
                        {/each}
                        <td class="right-0 sticky bg-glass-dark">
                            {#if $page.props.user.role === 'admin'}
                                <button class="p-1" on:click={() => deleteConfirm(row['id'] ?? row['ID'])}><DeleteIcon /></button>
                            {/if}
                            <button class="p-1" use:inertia={{ href: `/${urlGroup}/${row['id'] ?? row['ID']}/edit` }}
                                ><EditIcon /></button
                            >
                            <button class="p-1" use:inertia={{ href: `/${urlGroup}/${row['id'] ?? row['ID']}` }}
                                ><DetailIcon /></button
                            >
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
