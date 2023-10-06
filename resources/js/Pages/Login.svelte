<script>
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
        <div class="flex">
            <div class="vertical-bar" />
        </div>
        <div class="flex flex-col justify-center mx-3">
            <div class="input-text">
                <label for="username">User</label><input
                    type="text"
                    name="username"
                    id=""
                />
            </div>
            <div class="input-text">
                <label for="password">Password</label><input
                    type="password"
                    name="password"
                    id=""
                />
            </div>
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
    .input-text {
        @apply flex justify-between w-64 my-2;
    }
    input[type='text'],
    input[type='password'] {
        @apply rounded w-40 text-white;
        background-color: rgba(170, 170, 170, 0.5);
    }
    input[type='text']:hover,
    input[type='password']:hover {
        background-color: rgba(170, 170, 170, 0.8);
    }
    button {
        background-color: rgb(80, 80, 80);
        @apply w-24 mt-3 rounded self-center;
    }
    button:hover {
        background-color: rgb(100, 100, 100);
    }
</style>
