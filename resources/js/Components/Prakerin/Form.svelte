<script>
    export let input = {
        NAMA_LENGKAP: null,
        NAMA_SEKOLAH: null,
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
    }

    export let submit
</script>

<div class="p-10">
    <form on:submit|preventDefault={() => submit(input)} class="flex flex-col gap-y-6 items-center">
        <div class="input-container">
            <div>
                <label for="nama">Nama Lengkap:</label>
                <input type="text" name="nama" class="input w-full max-w-xs" bind:value={input.NAMA_LENGKAP} />
            </div>
            <div>
                <label for="nama_sekolah">Nama Sekolah:</label>
                <input type="text" name="nama_sekolah" class="input w-full max-w-xs" bind:value={input.NAMA_SEKOLAH} />
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
                <label for="foto">Foto:</label>
                <input
                    type="file"
                    name="foto"
                    class="file-input file-input-bordered w-full max-w-xs"
                    on:input={(e) => (input.FOTO = e.target.files[0])}
                />
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
