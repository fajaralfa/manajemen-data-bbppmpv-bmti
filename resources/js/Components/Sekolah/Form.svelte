<script>
    import { router } from '@inertiajs/svelte'
    import InputText from '../Formulir/InputText.svelte'
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
    export let errors
</script>

<div class="p-10">
    <form class="flex flex-col gap-y-6 items-center" on:submit|preventDefault={() => submit(input)}>
        <div class="input-container">
            <InputText bind:value={input['NAMA_SEKOLAH']} error={errors['NAMA_SEKOLAH']}>Nama Sekolah</InputText>
            <InputText bind:value={input['NPSN_SEKOLAH']} error={errors['NPSN_SEKOLAH']}>NPSN Sekolah</InputText>
            <InputText bind:value={input['NAMA_KEPALA_SEKOLAH']} error={errors['NAMA_KEPALA_SEKOLAH']}>
                Nama Kepala Sekolah
            </InputText>
            <InputText bind:value={input['NOMOR_HP_KEPALA_SEKOLAH']} error={errors['NOMOR_HP_KEPALA_SEKOLAH']}>
                Nomor HP Kepala Sekolah
            </InputText>
            <InputText bind:value={input['JENJANG_SEKOLAH']} error={errors['JENJANG_SEKOLAH']}>Jenjang Sekolah</InputText>
            <InputText bind:value={input['KABUPATEN_SEKOLAH']} error={errors['KABUPATEN_SEKOLAH']}>Kabupaten Sekolah</InputText>
            <InputText bind:value={input['PROVINSI_SEKOLAH']} error={errors['PROVINSI_SEKOLAH']}>Provinsi Sekolah</InputText>
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
