<script>
    import Layout from '../Components/Layout.svelte'
</script>

<Layout>
    <div class="flex flex-col justify-center items-center gap-y-6">
        <div>
            <div class="stats stats-vertical lg:stats-horizontal shadow">
                <div class="stat">
                    <div class="stat-title">Jumlah Prakerin</div>
                    <div class="stat-value">1000</div>
                    <div class="stat-desc">Tahun 2023-2024</div>
                </div>
            </div>
            <div class="stats stats-vertical lg:stats-horizontal shadow">
                <div class="stat">
                    <div class="stat-title">Jumlah Diklat</div>
                    <div class="stat-value">550</div>
                    <div class="stat-desc">Tahun 2023-2024</div>
                </div>
            </div>
            <div class="stats stats-vertical lg:stats-horizontal shadow">
                <div class="stat">
                    <div class="stat-title">Jumlah Barang</div>
                    <div class="stat-value">500</div>
                    <div class="stat-desc">Tahun 2023-2024</div>
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
