<script>
    import Layout from '../Components/Layout.svelte'
    import { slide, fly } from 'svelte/transition'

    export let data

    const year = new Date().getFullYear()
    const imagesPath = ['/img/mm-1.jpeg', '/img/mm-2.jpeg', '/img/mm-3.jpeg']
</script>

<svelte:head>
    <title>Dashboard</title>
</svelte:head>
<Layout>
    <div class="grid-container">
        <div class="grid-item carousel-vertical">
            {#each imagesPath as path}
                <div id={path} class="carousel-item">
                    <img src={path} alt="" srcset="" />
                </div>
            {/each}
        </div>
        <div class="grid-item flex justify-center items-center gap-5">
            <div class="stats stats-vertical lg:stats-horizontal shadow">
                <div class="stat">
                    <div class="stat-title">Jumlah Prakerin</div>
                    <div class="stat-value">{data.jumlahPrakerin}</div>
                    <div class="stat-desc">Tahun {year}</div>
                </div>
            </div>
            <div class="stats stats-vertical lg:stats-horizontal shadow">
                <div class="stat">
                    <div class="stat-title">Jumlah Diklat</div>
                    <div class="stat-value">{data.jumlahDiklat}</div>
                    <div class="stat-desc">Tahun {year}</div>
                </div>
            </div>
            <div class="stats stats-vertical lg:stats-horizontal shadow">
                <div class="stat">
                    <div class="stat-title">Jumlah Barang</div>
                    <div class="stat-value">{data.jumlahInventaris}</div>
                    <div class="stat-desc">Tahun {year}</div>
                </div>
            </div>
        </div>
        <div class="grid-item flex justify-center items-center">DIBUAT OLEH TIM DARI SMKN BANTARKALONG</div>
    </div>
</Layout>

<style>
    .grid-container {
        @apply grid grid-cols-2 grid-rows-2 h-[35rem] gap-5 p-5;
    }
    .grid-item:nth-child(1) {
        grid-row: 1/3;
    }
    .grid-item {
        @apply bg-glass-dark rounded-xl;
    }
</style>
