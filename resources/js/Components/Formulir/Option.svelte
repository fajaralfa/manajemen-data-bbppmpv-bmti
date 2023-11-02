<script>
    export let value
    export let options = []
</script>

<div class="flex justify-between items-center">
    <label for="kompetensi"><slot>Option Field</slot></label>
    <select name="kompetensi" class="select select-bordered w-full max-w-xs" bind:value>
        {#each options as option}
            <option value={option} class="capitalize">{option}</option>
        {/each}
    </select>
</div>
