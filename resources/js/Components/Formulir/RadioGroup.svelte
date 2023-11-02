<script>
    export let value
    export let options = {
        // label : value,
    }
</script>

<div class="flex justify-between items-center">
    <label for="jenis_kelamin"><slot>Radio Group Field</slot></label>
    <div class="flex gap-3">
        {#each Object.entries(options) as [label, val]}
            <input type="radio" value={val} class="radio" bind:group={value} />
            <label for="jenis_kelamin" value={val}>{label}</label>
        {/each}
    </div>
</div>
