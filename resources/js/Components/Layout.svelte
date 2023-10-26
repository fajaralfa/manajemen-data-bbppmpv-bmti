<script>
    import { inertia } from '@inertiajs/svelte'
    let dropdownList = [false, false, false]
    function dropDownToggle(num) {
        if (dropdownList[num] === true) {
            dropdownList[num] = false
            return
        }
        for (let i = 0; i < dropdownList.length; i++) {
            if (i === num) continue
            dropdownList[i] = false
        }
        dropdownList[num] = true
    }

    let sidebarShow = false
    function sidebarToggle() {
        sidebarShow = !sidebarShow
    }
</script>

<div class="navbar bg-black max-h-12 min-h-12 sticky top-0 z-[2]">
    <div class="flex-none">
        <button class="btn btn-square btn-ghost" on:click={sidebarToggle}>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"
                ><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg
            >
        </button>
    </div>
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl">Aplikasi</a>
    </div>
    <div class="flex-none">
        <button class="btn btn-square btn-ghost">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 stroke-current"
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
<div class="h-full fixed top-0 left-0 bg-glass-dark overflow-x-hidden {sidebarShow ? 'w-52' : 'w-0'}">
    <ul class="navlist menu py-12 px-0 w-52 min-h-full bg-black text-base-content">
        <!-- Sidebar content here -->
        <li>
            <a href="/home" use:inertia>Dashboard</a>
        </li>
        <li>
            <a on:click={() => dropDownToggle(0)}>Prakerin</a>
            {#if dropdownList[0]}
                <ul>
                    <li><a href="/prakerin" use:inertia>Lihat Data</a></li>
                    <li><a href="/prakerin/add" use:inertia>Tambah Data</a></li>
                </ul>
            {/if}
        </li>
        <li>
            <a on:click={() => dropDownToggle(1)}>Diklat</a>
            {#if dropdownList[1]}
                <ul>
                    <li><a href="/diklat" use:inertia>Lihat Data</a></li>
                    <li><a href="/diklat/add" use:inertia>Tambah Data</a></li>
                    <li><a href="/diklat/import" use:inertia>Import Data</a></li>
                </ul>
            {/if}
        </li>
        <li>
            <a on:click={() => dropDownToggle(2)}>Inventaris</a>
            {#if dropdownList[2]}
                <ul>
                    <li><a href="/inventaris" use:inertia>Lihat Data</a></li>
                    <li><a href="/inventaris/add" use:inertia>Tambah Data</a></li>
                </ul>
            {/if}
        </li>
        <li>
            <a on:click={() => dropDownToggle(3)}>Sekolah</a>
            {#if dropdownList[3]}
                <ul>
                    <li><a href="/sekolah" use:inertia>Lihat Data</a></li>
                    <li><a href="/sekolah/add" use:inertia>Tambah Data</a></li>
                </ul>
            {/if}
        </li>
        <li>
            <a href="/logout" use:inertia={{ method: 'post' }} as="button">Logout</a>
        </li>
    </ul>
</div>

<div class={sidebarShow ? 'ml-52' : 'ml-0'}><slot /></div>

<style>
    a {
        @apply rounded-none;
    }
    li a:hover {
        background-color: rgba(100, 100, 100, 0.5);
    }
</style>
