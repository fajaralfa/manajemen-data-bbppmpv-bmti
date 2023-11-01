<script>
    export let value = ''
    export let error = ''
    $: console.log(error)
</script>

<div class="flex justify-between items-center">
    <label for="nama"><slot>Field</slot></label>
    <div class="max-w-xs w-full">
        {#if error}
            <div class="text-xs text-center">{error}</div>
        {/if}
        <input type="text" class="input w-full max-w-xs border {error ? 'border border-red-600' : ''}" bind:value />
    </div>
</div>

<style>
</style>
