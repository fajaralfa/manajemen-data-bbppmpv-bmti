<script context="module">
    export { default as layout } from '../Components/Layout.svelte'
    let active = false
</script>


<div class="sidebar">
    <div class="dropdown">
        <button>Dashboard</button>
        <div class="dropdown-content">
            <a href="#">Lihat Data</a>
            <a href="#">Tambah Data</a>
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
</div>

<style>
    .sidebar{
        background-color:var(--bg-color);
        @apply m-0 p-0 w-52 fixed h-full overflow-auto;
    }
    .sidebar button {
        @apply block p-4 w-full text-left;
    }
    .sidebar button:hover{
        background-color: rgba(255, 255, 255, 0.783);
        @apply text-black;
    }
    .dropdown{
        position: relative;
    }
    .dropdown-content{
        display: none;
        position: relative;
        background-color: rgba(164, 163, 163, 0.795);
        width: 100%;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    } 
    .dropdown-content a{
        padding: 12px 16px;
        text-decoration: none;
        display:block;
    }
    .dropdown-content a:hover{
        background-color: #f1f1f1;
        color: black;
    }
    .dropdown:hover .dropdown-content{
        display: block;
    }
</style>