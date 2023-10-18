<script>
    import Layout from '../Components/Layout.svelte'
    import { inertia } from '@inertiajs/svelte'
</script>

<Layout>
    <h1 class="text-4xl font-bold">Halaman Test</h1>
    <a use:inertia href="/other" class="btn btn-primary">pergi ke halaman lain</a>
</Layout>
