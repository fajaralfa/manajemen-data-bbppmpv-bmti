<script>
    import { slide } from 'svelte/transition'
    import { inertia, page } from '@inertiajs/svelte'
    import ThreeDotIcon from '../Assets/ThreeDotIcon.svelte'
    import HamburgerIcon from '../Assets/HamburgerIcon.svelte'
    import UserAdminIcon from '../Assets/UserAdminIcon.svelte'
    import UserOperatorIcon from '../Assets/UserOperatorIcon.svelte'

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

    let link = window.location.pathname
    $: console.log(link)
</script>

<div class="navbar bg-glass-dark max-h-12 min-h-12 sticky top-0 z-[2]">
    <div class="flex-none">
        <button class="btn btn-square btn-ghost" on:click={sidebarToggle}><HamburgerIcon /></button>
    </div>
    <div class="flex-1">
        <a href="/" use:inertia class="btn btn-ghost normal-case text-xl">Data Management System</a>
    </div>
    <details class="dropdown dropdown-end">
        <summary class="m-1 btn"><ThreeDotIcon /></summary>
        <div class="shadow menu dropdown-content z-[1] bg-base-100 rounded-box w-52 h-32 flex items-center gap-3">
            <div class="flex items-center gap-3">
                <div>
                    {#if $page.props.user.role === 'admin'}
                        <UserAdminIcon width="50" height="50" />
                    {/if}
                    {#if $page.props.user.role === 'operator'}
                        <UserOperatorIcon width="50" height="50" />
                    {/if}
                </div>
                <div>
                    <div class="font-bold text-lg">{$page.props.user.name}</div>
                    <div class="text-xs">{$page.props.user.role}</div>
                </div>
            </div>
            <div>
                <a href="/logout" use:inertia={{ method: 'post' }}>Logout</a>
            </div>
        </div>
    </details>
</div>
<div class="sidebar mt-12 h-full fixed top-0 left-0 bg-glass-dark overflow-x-hidden {sidebarShow ? 'w-52' : 'w-0'}">
    <ul class="navlist menu px-0 w-52 min-h-full text-base-content">
        <!-- Sidebar content here -->
        <li>
            <a href="/home" use:inertia class={link.split('/')[1] == 'home' ? 'bg-slate-700' : ''}>Dashboard</a>
        </li>
        <li>
            <a class={link.split('/')[1] == 'prakerin' ? 'bg-slate-700' : ''} on:click={() => dropDownToggle(0)}>Prakerin</a>
            {#if dropdownList[0]}
                <ul transition:slide>
                    <li>
                        <a href="/prakerin/add" use:inertia class={link == '/prakerin/add' ? 'bg-slate-700' : ''}>Tambah Data</a>
                    </li>
                    <li><a href="/prakerin" use:inertia class={link == '/prakerin' ? 'bg-slate-700' : ''}>Lihat Data</a></li>
                    <li>
                        <a href="/prakerin/import" use:inertia class={link == '/prakerin/import' ? 'bg-slate-700' : ''}
                            >Import Data</a
                        >
                    </li>
                </ul>
            {/if}
        </li>
        <li>
            <a class={link.split('/')[1] == 'diklat' ? 'bg-slate-700' : ''} on:click={() => dropDownToggle(1)}>Diklat</a>
            {#if dropdownList[1]}
                <ul transition:slide>
                    <li><a href="/diklat/add" use:inertia class={link == '/diklat/add' ? 'bg-slate-700' : ''}>Tambah Data</a></li>
                    <li><a href="/diklat" use:inertia class={link == '/diklat' ? 'bg-slate-700' : ''}>Lihat Data</a></li>
                    <li>
                        <a href="/diklat/import" use:inertia class={link == '/diklat/import' ? 'bg-slate-700' : ''}>Import Data</a
                        >
                    </li>
                </ul>
            {/if}
        </li>
        <li>
            <a class={link.split('/')[1] == 'inventaris' ? 'bg-slate-700' : ''} on:click={() => dropDownToggle(2)}>Inventaris</a>
            {#if dropdownList[2]}
                <ul transition:slide>
                    <li>
                        <a href="/inventaris/add" use:inertia class={link == '/inventaris/add' ? 'bg-slate-700' : ''}
                            >Tambah Data</a
                        >
                    </li>
                    <li><a href="/inventaris" use:inertia class={link == '/inventaris' ? 'bg-slate-700' : ''}>Lihat Data</a></li>
                    <li>
                        <a href="/inventaris/import" use:inertia class={link == '/inventaris/import' ? 'bg-slate-700' : ''}
                            >Import Data</a
                        >
                    </li>
                </ul>
            {/if}
        </li>
        <li>
            <a class={link.split('/')[1] == 'sekolah' ? 'bg-slate-700' : ''} on:click={() => dropDownToggle(3)}>Sekolah</a>
            {#if dropdownList[3]}
                <ul transition:slide>
                    <li>
                        <a href="/sekolah/add" use:inertia class={link == '/sekolah/add' ? 'bg-slate-700' : ''}>Tambah Data</a>
                    </li>
                    <li><a href="/sekolah" use:inertia class={link == '/sekolah' ? 'bg-slate-700' : ''}>Lihat Data</a></li>
                </ul>
            {/if}
        </li>
        {#if $page.props.user.role === 'admin'}
            <li>
                <a class={link.split('/')[1] == 'user' ? 'bg-slate-700' : ''} on:click={() => dropDownToggle(4)}>User</a>
                {#if dropdownList[4]}
                    <ul transition:slide>
                        <li>
                            <a href="/user/add" use:inertia class={link == '/user/add' ? 'bg-slate-700' : ''}>Tambah User</a>
                        </li>
                        <li><a href="/user" use:inertia class={link == '/user' ? 'bg-slate-700' : ''}>Lihat Data User</a></li>
                    </ul>
                {/if}
            </li>
        {/if}
    </ul>
</div>

<div class="main min-h-[92vh] {sidebarShow ? 'ml-52' : 'ml-0'}"><slot /></div>

<style>
    .main {
        transition: margin-left 0.5s;
    }
    .sidebar {
        transition: width 0.5s;
    }
    a {
        @apply rounded-none;
    }
    li a:hover {
        background-color: rgba(100, 100, 100, 0.5);
    }
</style>
