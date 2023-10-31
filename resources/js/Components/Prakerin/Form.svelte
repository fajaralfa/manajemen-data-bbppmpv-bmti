<script>
    export let input = {
        NAMA_LENGKAP: null,
        'NIS/NIM': null,
        BIDANG_KEAHLIAN: null,
        PROGRAM_KEAHLIAN: null,
        TEMPAT_LAHIR: null,
        TANGGAL_LAHIR: null,
        JENIS_KELAMIN: null,
        AGAMA: null,
        ALAMAT_LENGKAP: null,
        NO_HP: null,
        EMAIL: null,
        FOTO: null,
        TANGGAL_MASUK: null,
        TANGGAL_KELUAR: null,
        'TEMPAT/DEPARTEMEN_PELAKSANAAN': null,
        NAMA_SEKOLAH: null,
        'KABUPATEN/KOTA_SEKOLAH': null,
        STATUS_SEKOLAH: null,
        NSS: null,
        ALAMAT_LENGKAP_SEKOLAH: null,
        POSEL_SEKOLAH: null,
        HOBBY: null,
    }

    export let submit
</script>

<div class="p-10">
    <form on:submit|preventDefault={() => submit(input)} class="flex flex-col gap-y-6 items-center">
        <div class="input-container">
            <h1 class="uppercase font-bold text-xl mb-3">Identitas Siswa</h1>
            <div>
                <label for="nama">Nama Lengkap:</label>
                <input type="text" name="nama" class="input w-full max-w-xs" bind:value={input.NAMA_LENGKAP} />
            </div>
            <div>
                <label for="nis">NIS/NIM:</label>
                <input type="text" name="nis" class="input w-full max-w-xs" bind:value={input['NIS/NIM']} />
            </div>
            <div>
                <label for="bidang">Bidang Keahlian:</label>
                <input type="text" name="bidang" class="input w-full max-w-xs" bind:value={input.BIDANG_KEAHLIAN} />
            </div>
            <div>
                <label for="program">Program Keahlian:</label>
                <input type="text" name="program" class="input w-full max-w-xs" bind:value={input.PROGRAM_KEAHLIAN} />
            </div>
            <div>
                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" name="tempat_lahir" class="input w-full max-w-xs" bind:value={input.TEMPAT_LAHIR} />
            </div>
            <div>
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" class="input w-full max-w-xs" bind:value={input.TANGGAL_LAHIR} />
            </div>
            <div>
                <label for="jenis_kelamin">Jenis kelamin:</label>
                <label for="jenis_kelamin"
                    ><input
                        type="radio"
                        name="jenis_kelamin"
                        value="L"
                        class="radio"
                        bind:group={input.JENIS_KELAMIN}
                    />Laki-laki</label
                >
                <label for="jenis_kelamin"
                    ><input
                        type="radio"
                        name="jenis_kelamin"
                        value="P"
                        class="radio"
                        bind:group={input.JENIS_KELAMIN}
                    />Perempuan</label
                >
            </div>
            <div>
                <label for="agama">Agama:</label>
                <input type="text" name="agama" class="input w-full max-w-xs" bind:value={input.AGAMA} />
            </div>
            <div>
                <label for="alamat">Alamat Lengkap:</label>
                <textarea class="textarea" name="alamat" bind:value={input.ALAMAT_LENGKAP}></textarea>
            </div>
            <div>
                <label for="no_hp">No HP:</label>
                <input type="text" name="no_hp" class="input w-full max-w-xs" bind:value={input.NO_HP} />
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" class="input w-full max-w-xs" bind:value={input.EMAIL} />
            </div>
            <div>
                <label for="hobby">Hobby:</label>
                <input type="text" name="hobby" class="input w-full max-w-xs" bind:value={input.HOBBY} />
            </div>
            <div>
                <label for="foto">Foto:</label>
                <input
                    type="file"
                    name="foto"
                    class="file-input file-input-bordered w-full max-w-xs"
                    on:input={(e) => (input.FOTO = e.target.files[0])}
                />
            </div>
            <div>
                <label for="tanggal_masuk">Tanggal Masuk:</label>
                <input type="date" name="tanggal_masuk" class="input w-full max-w-xs" bind:value={input.TANGGAL_MASUK} />
            </div>
            <div>
                <label for="tanggal_keluar">Tanggal Keluar:</label>
                <input type="date" name="tanggal_keluar" class="input w-full max-w-xs" bind:value={input.TANGGAL_KELUAR} />
            </div>
            <div>
                <label for="tempat_departemen_pelaksanaan">Tempat Departemen Pelaksanaan:</label>
                <input
                    type="text"
                    name="tempat_departemen_pelaksanaan"
                    class="input w-full max-w-xs"
                    bind:value={input['TEMPAT/DEPARTEMEN_PELAKSANAAN']}
                />
            </div>
            <h1 class="uppercase font-bold text-xl mb-3 mt-5">Identitas Sekolah</h1>
            <div>
                <label for="nama_sekolah">Nama Sekolah:</label>
                <input type="text" name="nama_sekolah" class="input w-full max-w-xs" bind:value={input.NAMA_SEKOLAH} />
            </div>
            <div>
                <label for="kabupaten_kota_sekolah">Kabupaten/Kota Sekolah:</label>
                <input
                    type="text"
                    name="kabupaten_kota_sekolah"
                    class="input w-full max-w-xs"
                    bind:value={input['KABUPATEN/KOTA_SEKOLAH']}
                />
            </div>
            <div>
                <label for="status_sekolah">Status Sekolah:</label>
                <label for="status_sekolah"
                    ><input
                        type="radio"
                        name="status_sekolah"
                        value="Negeri"
                        class="radio"
                        bind:group={input.STATUS_SEKOLAH}
                    />Negeri</label
                >
                <label for="status_sekolah"
                    ><input
                        type="radio"
                        name="status_sekolah"
                        value="Swasta"
                        class="radio"
                        bind:group={input.STATUS_SEKOLAH}
                    />Swasta</label
                >
            </div>
            <div>
                <label for="nss">NSS:</label>
                <input type="text" name="nss" class="input w-full max-w-xs" bind:value={input.NSS} />
            </div>
            <div>
                <label for="alamat_sekolah">Alamat Lengkap Sekolah:</label>
                <textarea class="textarea" name="alamat_sekolah" bind:value={input.ALAMAT_LENGKAP_SEKOLAH}></textarea>
            </div>
            <div>
                <label for="posel_sekolah">Posel Sekolah:</label>
                <input type="email" name="posel_sekolah" class="input w-full max-w-xs" bind:value={input.POSEL_SEKOLAH} />
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
