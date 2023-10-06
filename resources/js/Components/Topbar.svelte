<script>
    let title = 'PESERTA DIKLAT'
    const filters = ['nama', 'tahun', 'dll']
    let filter = filters[0]
</script>

<div class="topbar">
    <div class="">=</div>
    <div class="title text-3xl justify-self-start">{title}</div>
    <div class="w-1/2">
        <form action="" class="flex w-full gap-3 justify-end">
            <label for="">Cari Berdasarkan: </label>
            <select name="" id="" bind:value={filter}>
                {#each filters as filterName}
                    <option value={filterName}>{filterName}</option>
                {/each}
            </select>
            <input type="text" placeholder="Masukan {filter}" />
        </form>
    </div>
</div>

<style>
    .title {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        @apply font-bold;
    }
    select {
        background-color: transparent;
    }
    .topbar {
        @apply flex justify-between items-center px-10 h-12;
        background-color: var(--bg-color);
    }
</style>
