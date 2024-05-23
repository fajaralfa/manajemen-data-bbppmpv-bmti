<script>
    import DeleteIcon from '@/Assets/DeleteIcon.svelte'
    import DetailIcon from '@/Assets/DetailIcon.svelte'
    import EditIcon from '@/Assets/EditIcon.svelte'
    import { Link, router } from '@inertiajs/svelte'

    export let columns = {}
    export let key = 'id'
    export let data = []
    /**@type {{img: string, delete: string, edit: string}} url*/
    export let url

    function confirmDelete(key) {
        router.delete(`${url.delete}/${key}`, {
            onBefore: () => confirm('Hapus data ini?')
        })
    }
</script>

<table class="table table-zebra rounded-none bg-base-300">
    <thead class="sticky top-0 text-base-content">
        <tr class="border-b-4">
            {#each Object.entries(columns) as [ label]}
                {#if typeof label == 'string'}
                    <th>{label}</th>
                {:else if typeof label == 'object'}
                    <th>{label.label}</th>
                {/if}
            {/each}
            <th class="right-0 sticky bg-neutral text-neutral-content">Aksi</th>
        </tr>
    </thead>
    <tbody class="text-base-content">
        {#each data as row (row[key])}
            <tr>
                {#each Object.entries(columns) as [column, label]}
                    {#if typeof label == 'object' && label.type == 'img'}
                        <td>
                            <a href={`${url.img}/${row[column].split('/')[1]}`} target="_blank" rel="noopener noreferrer">
                                <img src={`${url.img}/${row[column].split('/')[1]}`} alt="" srcset="" />
                            </a>
                        </td>
                    {:else if typeof label == 'string'}
                        <td>{row[column]}</td>
                    {/if}
                {/each}
                <td class="right-0 sticky bg-neutral">
                    <Link href={`${url.delete}/${row[key]}`}>
                        <DetailIcon />
                    </Link>
                    <button on:click={() => confirmDelete(row[key])}>
                        <DeleteIcon />
                    </button>
                    <Link href={`${url.edit}/${row[key]}`}>
                        <EditIcon />
                    </Link>
                </td>
            </tr>
        {/each}
    </tbody>
</table>
