<script context="module">
    export { default as layout } from '../../Components/Layout.svelte'
</script>

<div class="p-10">
    <form action="contact.php" method="POST" class="flex flex-col gap-y-6 items-center">
    <div class="input-container">
        <div>
            <label for="nama">Nama Lengkap:</label>
            <input
                type="text"
                name="nama"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="nama_sekolah">Nama Sekolah:</label>
            <input
                type="text"
                name="nama_sekolah"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="nis">NIS/NIM:</label>
            <input
                type="text"
                name="nis"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="bidang">Bidang Keahlian:</label>
            <input
                type="text"
                name="bidang"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="program">Program Keahlian:</label>
            <input
                type="text"
                name="program"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="tempat_lahir">Tempat, Tanggal Lahir:</label>
            <input
                type="text"
                name="tempat_lahir"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="jenis_kelamin">Jenis kelamin:</label>
            <label for="jenis_kelamin"
                ><input type="radio" name="jenis_kelamin" value="laki-laki" class="radio" /> Laki-laki</label
            >
            <label for="jenis_kelamin"
                ><input type="radio" name="jenis_kelamin" value="perempuan" class="radio" /> Perempuan</label
            >
        </div>
        <div>
            <label for="agama">Agama:</label>
            <input
                type="text"
                name="agama"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="alamat">Alamat Lengkap:</label>
            <textarea class="textarea" name="alamat"></textarea>
        </div>
        <div>
            <label for="no_hp">No HP:</label>
            <input
                type="text"
                name="no_hp"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="email">Email:</label>
            <input
                type="text"
                name="email"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="foto">Foto:</label>
            <input type="file" name="foto" class="file-input file-input-bordered w-full max-w-xs" />
        </div>
        <div>
            <input class="btn btn-neutral" type="submit" name="submit" value="Simpan" />
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
