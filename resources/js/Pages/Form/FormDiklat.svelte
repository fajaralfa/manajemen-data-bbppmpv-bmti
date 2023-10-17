<script context="module">
    export { default as layout } from '../../Components/Layout.svelte'
</script>

<div class="p-2">
    <form
        action="contact.php"
        method="POST"
        class="flex flex-col gap-y-10 rounded-xl bg-glass-dark px-16 py-5"
    >
        <div class="input-container grid grid-flow-col grid-cols-2 gap-x-10 gap-y-4">
            <div>
                <label for="nama">Nama Lengkap:</label>
                <input
                    type="text"
                    name="nama"
                    placeholder="Nama lengkap..."
                    class="input w-full max-w-xs"
                />
            </div>
            <div>
                <label for="kompetensi">Kompetensi Keahlian:</label>
                <select name="kompetensi" class="select select-bordered w-full max-w-xs">
                    <option value="islam">Multimedia</option>
                    <option value="kristen">Tkj</option>
                    <option value="hindu">Rpl</option>
                </select>
            </div>
            <div>
                <label for="program">Program Keahlian:</label>
                <select name="program" class="select select-bordered w-full max-w-xs">
                    <option value="islam">Multimedia</option>
                    <option value="kristen">Tkj</option>
                    <option value="hindu">Rpl</option>
                </select>
            </div>
            <div>
                <label for="bidang">Bidang Keahlian:</label>
                <select name="bidang" class="select select-bordered w-full max-w-xs">
                    <option value="islam">Multimedia</option>
                    <option value="kristen">Tkj</option>
                    <option value="hindu">Rpl</option>
                </select>
            </div>
            <div>
                <label for="id">ID:</label>
                <input type="text" name="id" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="nik">NIK:</label>
                <input type="text" name="nik" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="nuptk">NUPTK:</label>
                <input type="text" name="nuptk" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="nip">NIP:</label>
                <input type="text" name="nip" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="no_ukg">No UKG:</label>
                <input type="text" name="no_ukg" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" name="tempat_lahir" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="text" name="tanggal_lahir" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="usia">Usia:</label>
                <input type="text" name="usia" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="jenis_kelamin">Jenis kelamin:</label>
                <div class="flex gap-3">
                    <input type="radio" name="jenis_kelamin" value="laki-laki" class="radio" />
                    <label for="jenis_kelamin">Laki-laki</label>
                    <input type="radio" name="jenis_kelamin" value="perempuan" class="radio" />
                    <label for="jenis_kelamin">Perempuan</label>
                </div>
            </div>
            <div>
                <label for="jabatan">Jabatan:</label>
                <input type="email" name="jabatan" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="golongan">Golongan:</label>
                <input type="text" name="golongan" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="no_hp">NO HP:</label>
                <input type="text" name="no_hp" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="text" name="email" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="mapel">Mapel Ajar:</label>
                <input type="text" name="mapel" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="kelas_ajar">Kelas Ajar:</label>
                <input type="text" name="kelas_ajar" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="kelas">Kelas:</label>
                <input type="text" name="kelas" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="nama_diklat">Nama Diklat:</label>
                <input type="text" name="nama_diklat" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="periode_awal">Periode Awal:</label>
                <input type="text" name="periode_awal" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="periode_akhir">Periode Akhir:</label>
                <input type="text" name="periode_akhir" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="tempat_diklat">Tempat Diklat:</label>
                <input type="text" name="tempat_diklat" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="riwayat_diklat">Riwayat Diklat:</label>
                <input type="text" name="riwayat_diklat" class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="foto">Foto:</label>
                <input
                    type="file"
                    name="foto"
                    class="file-input file-input-bordered w-full max-w-xs"
                />
            </div>
            <div>
                <label for="keterangan">Keterangan:</label>
                <textarea class="textarea" name="keterangan"></textarea>
            </div>
        </div>
        <div>
            <input class="btn btn-neutral" type="submit" name="submit" value="Daftar" />
        </div>
    </form>
</div>

<style>
    .input-container {
        grid-template-rows: repeat(14, auto);
    }
    .input-container div {
        @apply flex justify-between;
    }
</style>
