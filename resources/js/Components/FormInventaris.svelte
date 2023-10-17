<div class="p-10">
    <form action="contact.php" method="POST" class="flex flex-col gap-y-6 items-center">
    <div class="input-container">
        <div>
            <label for="nama_barang">Nama Barang:</label>
            <input
                type="text"
                name="nama_barang"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="foto">Foto:</label>
            <input type="file" name="foto" class="file-input file-input-bordered w-full max-w-xs" />
        </div>
        <div>
            <label for="spesifikasi">Spesifikasi:</label>
            <textarea class="textarea" name="spesifikasi"></textarea>
        </div>
        <div>
            <label for="satuan">Satuan:</label>
            <select name="satuan" class="select select-bordered w-full max-w-xs">
                <option value="kristen">Unit</option>
            </select>
        </div>
        <div>
            <label for="volume">Volume:</label>
            <input
                type="text"
                name="volume"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="harga_satuan">Harga Satuan:</label>
            <input
                type="text"
                name="harga_satuan"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="jumlah">Jumlah:</label>
            <input
                type="text"
                name="jumlah"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="keterangan_produk">Keterangan Porduk:</label>
            <textarea class="textarea" name="keterangan_produk"></textarea>
        </div>
        <div>
            <label for="link_produk">Link Produk:</label>
            <input
                type="text"
                name="link_produk"
                class="input w-full max-w-xs"
            />
        </div>
        <div>
            <label for="urgensi">Urgensi:</label>
            <textarea class="textarea" name="urgensi"></textarea>
        </div>
        <div>
            <label for="kategori">Kategori:</label>
            <input
                type="text"
                name="kategori"
                class="input w-full max-w-xs"
            />
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