<script>
    export let value = ''
    export let error = ''
    export let type = 'text'
</script>

<div class="flex justify-between items-center">
    <label><slot>Field</slot></label>
    <div class="max-w-xs w-full">
        {#if error}
            <div class="text-xs text-center">{error}</div>
        {/if}
        <input
            {type}
            class="input w-full max-w-xs border {error ? 'border border-red-600' : ''}"
            on:input={(e) => (value = e.currentTarget.value)}
        />
    </div>
</div>

<style>
</style>
