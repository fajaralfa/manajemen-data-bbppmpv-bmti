<script>
    import Topbar from './Topbar.svelte'
    import Sidebar from '../Pages/Sidebar.svelte'
</script>

<main>
    <Topbar />
    <Sidebar />
    <slot />
</main>
