<script>
    import { page } from '@inertiajs/svelte'
</script>

{#if Object.keys($page.props.errors).length > 0}
    {#each Object.entries($page.props.errors) as [key, val]}
        <div class='alert alert-error'>{val}</div>
    {/each}
{/if}