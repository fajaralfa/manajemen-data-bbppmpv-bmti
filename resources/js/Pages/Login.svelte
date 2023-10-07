<script>
    import InputText from '../Components/Form/InputText.svelte'
    let username = '',
        password = ''
</script>

<div class="wh-fvh flex flex-col justify-center items-center">
    <form class="flex rounded-xl py-3" action="" method="post">
        <div class="flex items-center justify-center w-20">
            <img
                src="http://localhost:8080/lock.png"
                class="w-14 h-12"
                alt="gambar kunci"
                srcset=""
            />
        </div>
        <div class="vertical-bar" />
        <div class="flex flex-col justify-center mx-3 space-y-4 w-64">
            <InputText bind:value={username}>Username</InputText>
            <InputText type="password" bind:value={password}>Password</InputText>
            <button type="submit">Login</button>
        </div>
    </form>
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
