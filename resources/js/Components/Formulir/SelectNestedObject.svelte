<script>
    export let value
    export let options = {}
    export let error = ''
</script>

<div class="flex justify-between items-center">
    <label><slot>Select Nested Object Field</slot></label>
    <div class="max-w-xs w-full">
        {#if error}
            <div class="text-xs text-center">{error}</div>
        {/if}
        <select
            name="kompetensi"
            class="select select-bordered w-full max-w-xs {error ? 'border border-red-600' : ''}"
            bind:value
        >
            {#each Object.entries(options) as [key]}
                <option value={key} class="capitalize">{key}</option>
            {/each}
        </select>
    </div>
</div>
