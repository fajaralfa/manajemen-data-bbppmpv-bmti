<script>
    import { router } from '@inertiajs/svelte'
    import InputText from '../Components/AuthForm/InputText.svelte'
    import LockIcon from '../Assets/LockIcon.svelte'
    export let errors

    let input = {
        name: null,
        username: null,
        password: null,
        role: 'operator',
    }

    function doRegister() {
        router.post('/register', input)
    }
</script>

<svelte:head>
    <title>Register</title>
</svelte:head>
<div class="wh-fvh flex flex-col justify-center items-center text-white">
    <div class="bg-glass-dark rounded-xl py-3 px-3">
        {#if Object.keys(errors).length > 0}
            {#each Object.entries(errors) as [key, val]}
                <div class="bg-red-600">{val}</div>
            {/each}
        {/if}
        <form class="flex" on:submit|preventDefault={doRegister}>
            <div class="flex items-center justify-center w-20">
                <LockIcon />
            </div>
            <div class="vertical-bar" />
            <div class="flex flex-col justify-center mx-3 space-y-4 w-64">
                <InputText bind:value={input.name}>Name</InputText>
                <InputText bind:value={input.username}>Username</InputText>
                <InputText type="password" bind:value={input.password}>Password</InputText>
                <div class="justify-between flex">
                    <label>Role</label>
                    <select bind:value={input.role} class="">
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                    </select>
                </div>
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</div>

<style>
    .wh-fvh {
        height: 100vh;
    }
    .vertical-bar {
        @apply border-l-4 h-56 self-center;
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
    select {
        @apply rounded w-40 text-white;
        background-color: rgba(170, 170, 170, 0.5);
    }
    select option {
        @apply text-black;
    }
</style>
