<script>
    import {router} from '@inertiajs/svelte'
    import InputText from '../Components/Form/InputText.svelte'
    import LockIcon from '../Assets/LockIcon.svelte'
    let input = {
        username: null,
        password: null,
    }

    function doLogin() {
        router.post('/users', input)
    }
</script>

<div class="wh-fvh flex flex-col justify-center items-center text-white">
    <div class="bg-glass-dark rounded-xl py-3">
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
