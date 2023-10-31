<script>
    export let input = {
        Kategori: null,
        Nama_Peralatan: null,
        Gambar: null,
        Merk: null,
        Tipe: null,
        Spesifikasi: null,
        Nomor_Seri: null,
        Satuan: null,
        Volume: null,
        Harga_Satuan: null,
        Jumlah: null,
        Keterangan_Produk: null,
        Link_Produk: null,
        Urgensi: null,
        Waktu_Pengadaan: null,
    }

    export let submit
</script>

<div class="p-10">
    <form on:submit|preventDefault={() => submit(input)} class="flex flex-col gap-y-6 items-center">
        <div class="input-container">
            <div>
                <label for="Kategori">Kategori:</label>
                <input type="text" name="kategori" bind:value={input.Kategori} class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="nama_barang">Nama Peralatan:</label>
                <input type="text" name="nama_barang" bind:value={input.Nama_Peralatan} class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="foto">Foto:</label>
                <input
                    type="file"
                    name="foto"
                    on:input={(e) => (input.Gambar = e.target.files[0])}
                    class="file-input file-input-bordered w-full max-w-xs"
                />
            </div>
            <div>
                <label for="merk">Merk:</label>
                <input type="text" name="merk" bind:value={input.Merk} class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="tipe">Tipe:</label>
                <input type="text" name="tipe" bind:value={input.Tipe} class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="spesifikasi">Spesifikasi:</label>
                <textarea class="textarea" name="spesifikasi" bind:value={input.Spesifikasi}></textarea>
            </div>
            <div>
                <label for="nomor_seri">Nomor Seri:</label>
                <input type="text" name="nomor_seri" bind:value={input.Nomor_Seri} class="input w-full max-w-xs" />
            </div>
            <div>
                <label for="satuan">Satuan:</label>
                <select name="satuan" bind:value={input.Satuan} class="select select-bordered w-full max-w-xs">
                    <option value="unit">Unit</option>
                    <option value="slop">Slop</option>
                </select>
            </div>
            <div>
                <label for="volume">Volume:</label>
                <input type="text" name="volume" class="input w-full max-w-xs" bind:value={input.Volume} />
            </div>
            <div>
                <label for="harga_satuan">Harga Satuan:</label>
                <input type="text" name="harga_satuan" class="input w-full max-w-xs" bind:value={input.Harga_Satuan} />
            </div>
            <div>
                <label for="jumlah">Jumlah:</label>
                <input type="text" name="jumlah" class="input w-full max-w-xs" bind:value={input.Jumlah} />
            </div>
            <div>
                <label for="keterangan_produk">Keterangan Porduk:</label>
                <textarea class="textarea" name="keterangan_produk" bind:value={input.Keterangan_Produk}></textarea>
            </div>
            <div>
                <label for="link_produk">Link Produk:</label>
                <input type="text" name="link_produk" class="input w-full max-w-xs" bind:value={input.Link_Produk} />
            </div>
            <div>
                <label for="urgensi">Urgensi:</label>
                <textarea class="textarea" name="urgensi" bind:value={input.Urgensi}></textarea>
            </div>
            <div>
                <label for="waktu_pengadaan">Waktu Pengadaan:</label>
                <input type="date" name="waktu_pengadaan" class="input w-full max-w-xs" bind:value={input.Waktu_Pengadaan} />
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
