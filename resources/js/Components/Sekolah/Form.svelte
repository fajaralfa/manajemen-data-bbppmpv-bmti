<script>
    import { router } from '@inertiajs/svelte'
    import Layout from '../../Components/Layout.svelte'
    export let input = {
        NAMA_SEKOLAH: null,
        NPSN_SEKOLAH: null,
        NAMA_KEPALA_SEKOLAH: null,
        NOMOR_HP_KEPALA_SEKOLAH: null,
        JENJANG_SEKOLAH: null,
        KABUPATEN_SEKOLAH: null,
        PROVINSI_SEKOLAH: null,
    }
    export let submit
</script>

<div class="p-10">
    <form class="flex flex-col gap-y-6 items-center" on:submit|preventDefault={() => submit(input)}>
        <div class="input-container">
            <div>
                <label for="nama_sekolah">Nama Sekolah:</label>
                <input type="text" name="nama_sekolah" bind:value={input.NAMA_SEKOLAH} class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="npsn_sekolah">NPSN Sekolah:</label>
                <input type="text" name="npsn_sekolah" bind:value={input.NPSN_SEKOLAH} class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="nama_kepala_sekolah">Nama Kepala Sekolah:</label>
                <input
                    type="text"
                    name="nama_kepala_sekolah"
                    bind:value={input.NAMA_KEPALA_SEKOLAH}
                    class="input w-full max-w-xs"
                />
            </div>
            <div>
                <label for="nomor_hp_kepsek">Nomor HP Kepala Sekolah:</label>
                <input
                    type="text"
                    name="nomor_hp_kepsek"
                    bind:value={input.NOMOR_HP_KEPALA_SEKOLAH}
                    class="input w-full max-w-xs"
                />
            </div>
            <div>
                <label for="jenjang_sekolah">Jenjang Sekolah:</label>
                <input type="text" name="jenjang_sekolah" bind:value={input.JENJANG_SEKOLAH} class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="kabupaten_sekolah">Kabupaten Sekolah:</label>
                <input type="text" name="kabupaten_sekolah" bind:value={input.KABUPATEN_SEKOLAH} class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="provinsi_sekolah">Provinsi Sekolah:</label>
                <input type="text" name="provinsi_sekolah" bind:value={input.PROVINSI_SEKOLAH} class="input w-full max-w-xs" />
            </div>
            <div>
                <input class="btn btn-neutral" type="submit" name="submit" value="Simpan" />
            </div>
        </div>
    </form>
</div>

<style>
    .input-container {
        @apply grid grid-cols-1 gap-y-4 px-16 py-10 rounded-xl w-[40rem];
        background-color: rgba(0, 0, 0, 0.5);
        grid-template-rows: repeat(14, auto);
    }
    .input-container div {
        @apply flex justify-between;
    }
</style>
