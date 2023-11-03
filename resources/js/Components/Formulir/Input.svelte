<script>
    export let error = ''
    export let type = ''
    export let value = null
    export let binder = () => {}
</script>

<div class="flex justify-between items-center">
    <label><slot>Field</slot></label>
    <div class="max-w-xs w-full">
        {#if error}
            <div class="text-xs text-center">{error}</div>
        {/if}
        <input {type} {value} class="input w-full max-w-xs border {error ? 'border border-red-600' : ''}" on:input={binder} />
    </div>
</div>
