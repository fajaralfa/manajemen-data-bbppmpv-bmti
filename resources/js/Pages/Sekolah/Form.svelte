<script>
    import Layout from '../../Components/Layout.svelte'
</script>

<Layout>
    <div class="p-10">
        <form action="contact.php" method="POST" class="flex flex-col gap-y-6 items-center">
            <div class="input-container">
                <div>
                    <label for="id">ID:</label>
                    <input type="text" name="id" class="input w-full max-w-xs" />
                </div>
                <div>
                    <label for="nama_sekolah">Nama Sekolah:</label>
                    <input type="text" name="nama_sekolah" class="input w-full max-w-xs" />
                </div>
                <div>
                    <label for="npsn_sekolah">NPSN Sekolah:</label>
                    <input type="text" name="npsn_sekolah" class="input w-full max-w-xs" />
                </div>
                <div>
                    <label for="nama_kepala_sekolah">Nama Kepala Sekolah:</label>
                    <input type="text" name="nama_kepala_sekolah" class="input w-full max-w-xs" />
                </div>
                <div>
                    <label for="nomor_hp_kepsek">Nomor HP Kepala Sekolah:</label>
                    <input type="text" name="nomor_hp_kepsek" class="input w-full max-w-xs" />
                </div>
                <div>
                    <label for="jenjang_sekolah">Jenjang Sekolah:</label>
                    <input type="text" name="jenjang_sekolah" class="input w-full max-w-xs" />
                </div>
                <div>
                    <label for="kabupaten_sekolah">Kabupaten Sekolah:</label>
                    <input type="text" name="kabupaten_sekolah" class="input w-full max-w-xs" />
                </div>
                <div>
                    <label for="provinsi_sekolah">Provinsi Sekolah:</label>
                    <textarea class="textarea" name="provinsi_sekolah"></textarea>
                </div>
                <div>
                    <input class="btn btn-neutral" type="submit" name="submit" value="Simpan" />
                </div>
            </div>
        </form>
    </div>
</Layout>

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
