<script>
    export let value = ''
    export let error = ''
</script>

<div class="flex justify-between items-center">
    <label for="nama"><slot>File Field</slot></label>
    <div class="max-w-xs w-full">
        {#if error}
            <div class="text-xs text-center">{error}</div>
        {/if}
        <input
            type="file"
            class="input w-full max-w-xs border {error ? 'border border-red-600' : ''}"
            on:input={(e) => (value = e.target.files[0])}
        />
    </div>
</div>
