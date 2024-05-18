<script>
    import { slide } from 'svelte/transition'
    import { inertia, page } from '@inertiajs/svelte'
    import config from './config'
    import * as utils from '@/utils'

    let link = window.location.pathname
    function activeRoot(str, style = 'btn-neutral') {
        return utils.styleWhen(link.split('/')[1], str, style)
    }
    function active(str, style = 'btn-neutral') {
        return utils.styleWhen(link, str, style)
    }

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
</script>

<div class="drawer-side mt-8">
    <label for={config.id} aria-label="close sidebar" class="drawer-overlay"></label>
    <ul class="menu p-4 px-0 w-52 min-h-full bg-base-200 text-base-content">
        <li>
            <a href="/home" use:inertia class={active('/home')}>Dashboard</a>
        </li>
        <li>
            <button class={activeRoot('prakerin')} on:click={() => dropDownToggle(0)}>Prakerin</button>
            {#if dropdownList[0]}
                <ul transition:slide>
                    <li class={active('/prakerin/add')}>
                        <a href="/prakerin/add" use:inertia>Tambah Data</a>
                    </li>
                    <li>
                        <a href="/prakerin" use:inertia class={active('/prakerin')}>Lihat Data</a>
                    </li>
                    <li>
                        <a href="/prakerin/import" use:inertia class={active('/prakerin/import')}>Import Data</a>
                    </li>
                </ul>
            {/if}
        </li>
        <li>
            <button class={activeRoot('diklat')} on:click={() => dropDownToggle(1)}>Diklat</button>
            {#if dropdownList[1]}
                <ul transition:slide>
                    <li>
                        <a href="/diklat/add" use:inertia class={active('/diklat/add')}>Tambah Data</a>
                    </li>
                    <li><a href="/diklat" use:inertia class={active('/diklat')}>Lihat Data</a></li>
                    <li>
                        <a href="/diklat/import" use:inertia class={active('/diklat/import')}>Import Data</a
                        >
                    </li>
                </ul>
            {/if}
        </li>
        <li>
            <button class={activeRoot('inventaris')} on:click={() => dropDownToggle(2)}>Inventaris</button>
            {#if dropdownList[2]}
                <ul transition:slide>
                    <li>
                        <a href="/inventaris/add" use:inertia class={active('/inventaris/add')}
                            >Tambah Data</a
                        >
                    </li>
                    <li>
                        <a href="/inventaris" use:inertia class={active('/inventaris')}>Lihat Data</a>
                    </li>
                    <li>
                        <a href="/inventaris/import" use:inertia class={active('/inventaris/import')}>Import Data</a>
                    </li>
                </ul>
            {/if}
        </li>
        <li>
            <button class={activeRoot('sekolah')} on:click={() => dropDownToggle(3)}>Sekolah</button>
            {#if dropdownList[3]}
                <ul transition:slide>
                    <li>
                        <a href="/sekolah/add" use:inertia class={active('/sekolah/add')}>Tambah Data</a>
                    </li>
                    <li><a href="/sekolah" use:inertia class={active('/sekolah')}>Lihat Data</a></li>
                </ul>
            {/if}
        </li>
        {#if $page.props.user.role === 'admin'}
            <li>
                <button class={activeRoot('user')} on:click={() => dropDownToggle(4)}>User</button>
                {#if dropdownList[4]}
                    <ul transition:slide>
                        <li>
                            <a href="/user/add" use:inertia class={active('/user/add')}>Tambah User</a>
                        </li>
                        <li><a href="/user" use:inertia class={active('/user')}>Lihat Data User</a></li>
                    </ul>
                {/if}
            </li>
        {/if}
    </ul>
</div>

<style>
    a, button {
        @apply rounded-none;
    }
    li a:hover {
        background-color: rgba(100, 100, 100, 0.5);
    }
</style>
