<script>
    import { router, page } from '@inertiajs/svelte'
    import InputText from '../Components/Form/InputText.svelte'
    import LockIcon from '../Assets/LockIcon.svelte'
    export let errors

    let input = {
        username: null,
        password: null,
    }

    function doLogin() {
        router.post('/login', input)
    }
</script>

<div class="wh-fvh flex flex-col justify-center items-center text-white">
    <div class="bg-glass-dark rounded-xl py-3">
        {#if $page.props.flash.message}
            <div class="bg-green-600">{$page.props.flash.message}</div>
        {/if}
        {#if Object.keys(errors).length > 0}
            {#each Object.entries(errors) as [key, val]}
                <div class="bg-red-600">{val}</div>
            {/each}
        {/if}
        <form class="flex" on:submit|preventDefault={doLogin}>
            <div class="flex items-center justify-center w-20">
                <LockIcon />
            </div>
            <div class="vertical-bar" />
            <div class="flex flex-col justify-center mx-3 space-y-4 w-64">
                <InputText bind:value={input.username}>Username</InputText>
                <InputText type="password" bind:value={input.password}>Password</InputText>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>
</div>

<style>
    .wh-fvh {
        height: 100vh;
    }
    .vertical-bar {
        @apply border-l-4 h-32 self-center;
    }
    form {
        background-color: var(--bg-color);
    }
    button {
        background-color: rgb(80, 80, 80);
        @apply w-24 rounded self-center;
    }
    button:hover {
        background-color: rgb(100, 100, 100);
    }
</style>
