<script>
    export let value = ''
    export let error = ''
</script>

<div class="flex justify-between items-center">
    <label for="alamat"><slot>Field</slot></label>
    <div class="max-w-xs w-full">
        {#if error}
            <div class="text-xs text-center">{error}</div>
        {/if}
        <textarea class="input w-full h-24 max-w-xs border {error ? 'border border-red-600' : ''}" bind:value></textarea>
    </div>
</div>
