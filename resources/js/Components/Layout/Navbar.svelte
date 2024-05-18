<script>
    import { inertia, page } from '@inertiajs/svelte'
    import ThreeDotIcon from '@/Assets/ThreeDotIcon.svelte'
    import HamburgerIcon from '@/Assets/HamburgerIcon.svelte'
    import UserAdminIcon from '@/Assets/UserAdminIcon.svelte'
    import UserOperatorIcon from '@/Assets/UserOperatorIcon.svelte'
    import drawer from './config'
</script>

<div class="navbar bg-base-300 max-h-12 min-h-12 sticky top-0 z-[2]">
    <div class="flex-none">
        <label for={drawer.id} class="btn btn-ghost drawer-button"><HamburgerIcon /></label>
    </div>
    <div class="flex-1">
        <a href="/" use:inertia class="btn btn-ghost normal-case text-xl">Data Management System</a>
    </div>
    <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn m-1 bg-inherit border-none"><ThreeDotIcon /></div>
        <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-300 rounded-box w-52">
            <li>
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
            </li>
            <li>
                <a href="/logout" use:inertia={{ method: 'post' }}>Logout</a>
            </li>
        </ul>
    </div>
</div>
