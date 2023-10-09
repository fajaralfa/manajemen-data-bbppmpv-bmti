<script context="module">
    export { default as layout } from '../Components/Layout.svelte'
</script>


<div class="sidebar">
    <a class="active" href="#home">Dashboard</a>
    <a href="peserta diklat">Peserta Diklat</a>
    <a href="peserta diklat">Peserta PKL</a>
    <a href="peserta diklat">Inventaris</a>
</div>

<style>
    .sidebar{
        background-color:var(--bg-color);
        @apply m-0 p-0 w-52 fixed h-full overflow-auto;
    }
    .sidebar a {
        @apply block p-4 ;
    }
    .sidebar a:hover{
        background-color: rgba(255, 255, 255, 0.783);
        @apply text-black;
    }
</style>