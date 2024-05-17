<script>
    import { useForm, page } from '@inertiajs/svelte'
    import InputText from '@/Components/AuthForm/InputText.svelte'
    import LockIcon from '@/Assets/LockIcon.svelte'
    import Alerts from '@/Components/Shared/Alerts.svelte'

    let form = useForm({
        username: null,
        password: null,
        remember: false,
    })

    function submit() {
        $form.post('/login')
    }
</script>

<svelte:head>
    <title>Login</title>
</svelte:head>
<div class="h-[100vh] flex flex-col justify-center items-center text-white">
    <div class="bg-glass-dark rounded-xl py-3">
        <Alerts />
        <form class="flex" on:submit|preventDefault={submit}>
            <div class="flex items-center justify-center w-20"><LockIcon /></div>
            <div id="vertical-bar" class="border-l-4 h-40 self-center" />
            <div class="flex flex-col justify-center mx-3 space-y-4 w-64">
                <InputText bind:value={$form.username}>Username</InputText>
                <InputText type="password" bind:value={$form.password}>Password</InputText>
                <label class="text-xs">
                    <input type="checkbox" bind:checked={$form.remember} />
                    Remember Me
                </label>
                <button type="submit" class="bg-[rgb(80,80,80)] w-24 rounded self-center hover:bg-[rgb(100,100,100)]">Login</button>
            </div>
        </form>
    </div>
</div>

<style>
</style>
