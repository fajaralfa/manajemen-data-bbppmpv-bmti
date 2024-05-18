<script>
    import Sidebar from './Sidebar.svelte'
    import config from './config'

</script>

<div class="drawer">
    <input id={config.id} type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col items-center justify-center">
        <slot />
    </div>
    <Sidebar />
</div>