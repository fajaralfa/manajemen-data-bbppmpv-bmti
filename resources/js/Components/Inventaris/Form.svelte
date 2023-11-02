<script>
    import InputText from '../Formulir/InputText.svelte'
    import InputFile from '../Formulir/InputFile.svelte'
    import InputDate from '../Formulir/InputDate.svelte'
    import TextArea from '../Formulir/TextArea.svelte'
    import Option from '../Formulir/Option.svelte'

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
    export let errors
</script>

<div class="p-10">
    <form on:submit|preventDefault={() => submit(input)} class="flex flex-col gap-y-6 items-center">
        <div class="input-container">
            <InputText bind:value={input.Nama_Peralatan} error={errors.Nama_Peralatan}>Nama Peralatan</InputText>
            <InputFile bind:value={input.Gambar} error={errors.Gambar}>Gambar</InputFile>
            <InputText bind:value={input.Merk} error={errors.Merk}>Merk</InputText>
            <InputText bind:value={input.Tipe} error={errors.Tipe}>Tipe</InputText>
            <InputText bind:value={input.Spesifikasi} error={errors.Spesifikasi}>Spesifikasi</InputText>
            <InputText bind:value={input.Nomor_Seri} error={errors.Nomor_Seri}>Nomor Seri</InputText>
            <Option bind:value={input.Satuan} options={['unit', 'slop']}>Satuan</Option>
            <InputText bind:value={input.Jumlah} error={errors.Jumlah}>Jumlah</InputText>
            <InputText bind:value={input.Harga_Satuan} error={errors.Harga_Satuan}>Harga Satuan</InputText>
            <InputText bind:value={input.Volume} error={errors.Volume}>Volume</InputText>
            <TextArea bind:value={input.Keterangan_Produk} error={errors.Keterangan_Produk}>Keterangan Produk</TextArea>
            <InputText bind:value={input.Link_Produk} error={errors.Link_Produk}>Link Produk</InputText>
            <InputText bind:value={input.Urgensi} error={errors.Urgensi}>Urgensi</InputText>
            <InputDate bind:value={input.Waktu_Pengadaan} error={errors.Waktu_Pengadaan}>Waktu Pengadaan</InputDate>
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
