<script>
    import Navbar from './Layout/Navbar.svelte'
    import Drawer from './Layout/Drawer.svelte'

</script>

<Navbar />
<Drawer>
    <slot />
</Drawer>
