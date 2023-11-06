<script>
    import Layout from '../Components/Layout.svelte'

    export let data

    const year = new Date().getFullYear()
</script>

<svelte:head>
    <title>Dashboard</title>
</svelte:head>
<Layout>
    <div class="flex flex-col justify-center items-start gap-y-6">
        <div>
            <div class="stats stats-vertical lg:stats-horizontal shadow w-40 h-32">
                <div class="stat">
                    <div class="stat-title">Jumlah Prakerin</div>
                    <div class="stat-value">{data.jumlahPrakerin}</div>
                    <div class="stat-desc">Tahun {year}</div>
                </div>
            </div>
            <div class="stats stats-vertical lg:stats-horizontal shadow w-40 h-32">
                <div class="stat">
                    <div class="stat-title">Jumlah Diklat</div>
                    <div class="stat-value">{data.jumlahDiklat}</div>
                    <div class="stat-desc">Tahun {year}</div>
                </div>
            </div>
            <div class="stats stats-vertical lg:stats-horizontal shadow w-40 h-32">
                <div class="stat">
                    <div class="stat-title">Jumlah Barang</div>
                    <div class="stat-value">{data.jumlahInventaris}</div>
                    <div class="stat-desc">Tahun {year}</div>
                </div>
            </div>
        </div>
        <div class="w-[35rem] carousel rounded-box">
            <div class="carousel-item w-full">
                <img src="/img/hhi.jpg" class="w-full" alt="Tailwind CSS Carousel component" />
            </div>
            <div class="carousel-item w-full">
                <img src="/img/hhe.jpg" class="w-full" alt="Tailwind CSS Carousel component" />
            </div>
            <div class="carousel-item w-full">
                <img src="/img/hhu.jpg" class="w-full" alt="Tailwind CSS Carousel component" />
            </div>
            <div class="carousel-item w-full">
                <img src="/img/hayu.jpg" class="w-full" alt="Tailwind CSS Carousel component" />
            </div>
        </div>
    </div>
</Layout>
