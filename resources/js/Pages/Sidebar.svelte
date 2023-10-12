<script context="module">
    export { default as layout } from '../Components/Layout.svelte'
</script>


<div class="sidebar">
    <div class="dropdown">
        <button>Dashboard</button>
        <div class="dropdown-content">
        </div>
    </div>
    <div class="dropdown">
        <button>Peserta Diklat</button>
        <div class="dropdown-content">
            <a href="#">Lihat Data</a>
            <a href="#">Tambah Data</a>
        </div>
    </div>
    <div class="dropdown">
        <button>Peserta PKL</button>
        <div class="dropdown-content">
            <a href="#">Lihat Data</a>
            <a href="#">Tambah Data</a>
        </div>
    </div>
    <div class="dropdown">
        <button>Inventaris</button>
        <div class="dropdown-content">
            <a href="#">Lihat Data</a>
            <a href="#">Tambah Data</a>
        </div>
    </div>
    <button class="btn">Logout</button>
</div>




<style>
    .sidebar{
        background-color:var(--bg-color);
        @apply m-0 p-0 pt-12 w-52 absolute h-full overflow-auto top-0;
        z-index: -1;
    }
    .sidebar button {
        @apply block p-4 w-full text-left;
    }
    .sidebar button:hover{
        background-color: rgba(255, 255, 255, 0.783);
        @apply text-black;
    }
    .dropdown{
        @apply relative;
    }
    .dropdown-content{
        @apply hidden relative w-full; 
        background-color: rgba(164, 163, 163, 0.795);
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    } 
    .dropdown-content a{
        @apply px-3 py-4 no-underline block;
    }
    .dropdown-content a:hover{
        @apply bg-white text-black;
    }
    .dropdown:hover .dropdown-content{
        @apply block;
        
    }
    .btn{
        @apply bottom-0 absolute;
        
    }

</style>
