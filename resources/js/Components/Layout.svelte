<script>
    import Navbar from './Layout/Navbar.svelte'
    import Drawer from './Layout/Drawer.svelte'
    import FlashMessages from './Layout/FlashMessages.svelte'

</script>

<Navbar />
<Drawer>
    <FlashMessages />
    <slot />
</Drawer>
