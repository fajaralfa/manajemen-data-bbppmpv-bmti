<script>
    import { inertia } from '@inertiajs/svelte'
    let dropdownList = [false, false, false]
    function dropDownToggle(num) {
        dropdownList[num] = !dropdownList[num]
    }
</script>

<div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <!-- Page content here -->
        <div class="navbar bg-glass-dark max-h-12 min-h-12">
            <div class="flex-none">
                <label for="my-drawer" class="btn btn-square btn-ghost">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="inline-block w-5 h-5 stroke-current"
                        ><path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        ></path></svg
                    >
                </label>
            </div>
            <div class="flex-1">
                <a class="btn btn-ghost normal-case text-xl">Aplikasi</a>
            </div>
            <div class="flex-none">
                <button class="btn btn-square btn-ghost">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        class="inline-block w-5 h-5 stroke-current"
                        ><path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"
                        ></path></svg
                    >
                </button>
            </div>
        </div>
        <div class="my-1 ml-1 mr-0 rounded w-main-content">
            <slot />
        </div>
    </div>
    <div class="drawer-side">
        <label for="my-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="navlist menu py-12 px-0 w-52 min-h-full bg-glass-dark text-base-content">
            <!-- Sidebar content here -->
            <li>
                <a href="/home" use:inertia>Dashboard</a>
            </li>
            <li>
                <a on:click={() => dropDownToggle(0)}>Prakerin</a>
                {#if dropdownList[0]}
                    <ul>
                        <li><a href="/prakerin/add" use:inertia>Tambah Data</a></li>
                        <li><a href="/prakerin" use:inertia>Lihat Data</a></li>
                    </ul>
                {/if}
            </li>
            <li>
                <a on:click={() => dropDownToggle(1)}>Diklat</a>
                {#if dropdownList[1]}
                    <ul>
                        <li><a href="/diklat/add" use:inertia>Tambah Data</a></li>
                        <li><a href="/diklat" use:inertia>Lihat Data</a></li>
                    </ul>
                {/if}
            </li>
            <li>
                <a on:click={() => dropDownToggle(2)}>Inventaris</a>
                {#if dropdownList[2]}
                    <ul>
                        <li><a href="/inventaris/add" use:inertia>Tambah Data</a></li>
                        <li><a href="/inventaris" use:inertia>Lihat Data</a></li>
                    </ul>
                {/if}
            </li>
            <li>
                <a href="/logout" use:inertia={{ method: 'post' }} as="button">Logout</a>
            </li>
        </ul>
    </div>
</div>

<style>
    a {
        @apply rounded-none;
    }
    li a:hover {
        background-color: rgba(100, 100, 100, 0.5);
    }
</style>
