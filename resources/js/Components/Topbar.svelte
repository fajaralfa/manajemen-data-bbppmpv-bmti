<script>
    import InputText from './Form/InputText.svelte';
    export let searchText = ''

    let title = 'PESERTA DIKLAT'
    const filters = ['nama', 'tahun', 'dll']
    let filter = filters[0]
</script>

<div class="topbar flex items-center px-6 h-12">
    <div class="w-10 font-bold text-3xl">=</div>
    <div class="flex-grow title text-3xl">{title}</div>
    <div class="flex-grow w-2/3 flex">
        <form action="" class="flex w-full space-x-4 justify-end">
            <label for="">Cari Berdasarkan: </label>
            <select name="" id="" bind:value={filter}>
                {#each filters as filterName}
                    <option value={filterName}>{filterName}</option>
                {/each}
            </select>
            <InputText bind:value={searchText} placeholder='Masukan {filter}'/>
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
        background-color: var(--bg-color);
    }
</style>
