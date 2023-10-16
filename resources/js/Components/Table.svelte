<script>
    export let data = [{}]
</script>

<div class="overflow-x-scroll w-100vw bg-dark-glass">
    <table class="table">
        <thead class=" text-white uppercase">
            <tr>
                {#each Object.entries(data[0]) as [key]}
                <th>{key}</th>
                {/each}
            </tr>
        </thead>
        <tbody class="text-white">
            {#each data as row}
            <tr>
                {#each Object.entries(row) as [key, val]}
                <td>{val}</td>
                {/each}
            </tr>
            {/each}
        </tbody>
    </table>
</div>

<style>
    tr,th,td {
        border-color: white;
    }
    .w-100vw {
        width: 100vw;
    }
</style>