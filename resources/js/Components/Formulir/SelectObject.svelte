<script>
    export let value
    export let options = {}
    export let error = ''
</script>

<div class="flex justify-between items-center">
    <label><slot>Select Object Field</slot></label>
    <div class="max-w-xs w-full">
        {#if error}
            <div class="text-xs text-center">{error}</div>
        {/if}
        <select
            name="kompetensi"
            class="select select-bordered w-full max-w-xs {error ? 'border border-red-600' : ''}"
            bind:value
        >
            {#each Object.entries(options) as [key, value]}
                <option value={key}>{value}</option>
            {/each}
        </select>
    </div>
</div>
