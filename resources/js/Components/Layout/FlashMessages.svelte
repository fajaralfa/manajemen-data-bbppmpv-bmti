<script>
    import { page } from "@inertiajs/svelte";
    import { onMount } from 'svelte'
    
    let errors = $page.props.errors
    let flash = $page.props.message

    onMount(() => {
        setTimeout(() => {
            errors = {}
            flash = null
        }, 3000)
    })

</script>

{#if flash}
    <div class="alert alert-info">{flash}</div>
{/if}
{#each Object.entries(errors) as [k, v]}
    <div class="alert alert-error">{k}: {v}</div>
{/each}