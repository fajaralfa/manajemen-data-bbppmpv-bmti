<script>
    import DeleteIcon from '@/Assets/DeleteIcon.svelte'
    import EditIcon from '@/Assets/EditIcon.svelte'
    import { Link } from '@inertiajs/svelte'

    export let columns = {}
    export let key = 'id'
    export let data = []
    /**@type {{img: string, delete: string, edit: string}} url*/
    export let url

    $: console.log(url)
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
                        <td><img src={`${url.img}/${row[column].split('/')[1]}`} alt="" srcset="" /></td>
                    {:else if typeof label == 'string'}
                        <td>{row[column]}</td>
                    {/if}
                {/each}
                <td class="right-0 sticky bg-neutral">
                    <Link href={`${url.delete}/${row[key]}`} method="delete">
                        <DeleteIcon />
                    </Link>
                    <Link href={`${url.edit}/${row[key]}`}>
                        <EditIcon />
                    </Link>
                </td>
            </tr>
        {/each}
    </tbody>
</table>
