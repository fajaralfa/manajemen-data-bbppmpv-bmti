<script>
    export let value
    export let options = {
        // label : value,
    }
    export let error
</script>

<div class="flex justify-between items-center">
    <label for="jenis_kelamin"><slot>Radio Group Field</slot></label>
    <div class="flex gap-3 flex-col">
        {#if error}
            <div class="text-xs text-center">{error}</div>
        {/if}
        <div class="p-2 flex gap-2 {error ? 'border border-red-600' : ''}">
            {#each Object.entries(options) as [label, val]}
                <label value={val} class="flex items-center gap-3">
                    <input type="radio" value={val} class="radio" bind:group={value} />
                    {label}
                </label>
            {/each}
        </div>
    </div>
</div>
