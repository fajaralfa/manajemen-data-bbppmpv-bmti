<script>
    import { page } from '@inertiajs/svelte'
    import InputText from '../Formulir/InputText.svelte'
    import TextArea from '../Formulir/TextArea.svelte'
    import Option from '../Formulir/Option.svelte'
    import RadioGroup from '../Formulir/RadioGroup.svelte'
    import InputDate from '../Formulir/InputDate.svelte'
    import InputFile from '../Formulir/InputFile.svelte'

    export let input = {
        NAMA_LENGKAP: null,
        KOMPETENSI_KEAHLIAN: null,
        PROGRAM_KEAHLIAN: null,
        BIDANG_KEAHLIAN: null,
        NIK: null,
        NUPTK: null,
        NIP: null,
        NO_UKG: null,
        TEMPAT_LAHIR: null,
        TANGGAL_LAHIR: null,
        USIA: null,
        KELAMIN: null,
        JABATAN: null,
        GOLONGAN: null,
        NOMOR_HP: null,
        EMAIL: null,
        MAPEL_AJAR: null,
        KELAS_AJAR: null,
        KELAS: null,
        NAMA_DIKLAT: null,
        TANGGAL_PERIODE_AWAL: null,
        TANGGAL_PERIODE_AKHIR: null,
        TEMPAT_DIKLAT: null,
        RIWAYAT_DIKLAT: null,
        FOTO: null,
        KETERANGAN: null,
    }

    export let submit
    export let errors
</script>

<div class="p-2">
    {#if $page.props?.flash.message}
        <div class="bg-red-600">{$page.props.flash.message}</div>
    {/if}

    <form on:submit|preventDefault={() => submit(input)} class="flex flex-col gap-y-10 rounded-xl bg-glass-dark px-16 py-5">
        <div class="input-container grid grid-flow-col grid-cols-2 gap-x-10 gap-y-4">
            <InputText bind:value={input.NAMA_LENGKAP} error={errors.NAMA_LENGKAP}>Nama Lengkap</InputText>
            <Option
                bind:value={input.KOMPETENSI_KEAHLIAN}
                options={['multimedia', 'tkj', 'rpl', 'elit global']}
                error={errors.PROGRAM_KEAHLIAN}
            >
                Kompetensi Keahlian
            </Option>
            <Option bind:value={input.PROGRAM_KEAHLIAN} options={['multimedia', 'DLL', 'DLL']} error={errors.PROGRAM_KEAHLIAN}>
                Program Keahlian
            </Option>
            <Option bind:value={input.BIDANG_KEAHLIAN} options={['multimedia', 'DLL', 'DLL']} error={errors.BIDANG_KEAHLIAN}>
                Bidang Keahlian
            </Option>
            <InputText bind:value={input.NIK} error={errors.NIK}>NIK</InputText>
            <InputText bind:value={input.NUPTK} error={errors.NUPTK}>NUPTK</InputText>
            <InputText bind:value={input.NIP} error={errors.NIP}>NIP</InputText>
            <InputText bind:value={input.NO_UKG} error={errors.NO_UKG}>No. UKG</InputText>
            <InputText bind:value={input.TEMPAT_LAHIR} error={errors.TEMPAT_LAHIR}>Tempat Lahir</InputText>
            <InputDate bind:value={input.TANGGAL_LAHIR} error={errors.TANGGAL_LAHIR}>Tanggal Lahir</InputDate>
            <InputText bind:value={input.USIA} error={errors.USIA}>Usia</InputText>
            <RadioGroup bind:value={input.KELAMIN} options={{ 'Laki - Laki': 'L', Perempuan: 'P' }} error={errors.KELAMIN}
                >Jenis Kelamin</RadioGroup
            >
            <InputText bind:value={input.JABATAN} error={errors.JABATAN}>Jabatan</InputText>
            <InputText bind:value={input.GOLONGAN} error={errors.GOLONGAN}>Golongan</InputText>
            <InputText bind:value={input.NOMOR_HP} error={errors.NOMOR_HP}>Nomor HP</InputText>
            <InputText bind:value={input.EMAIL} error={errors.EMAIL}>Email</InputText>
            <InputText bind:value={input.MAPEL_AJAR} error={errors.MAPEL_AJAR}>Mapel Ajar</InputText>
            <InputText bind:value={input.KELAS_AJAR} error={errors.KELAS_AJAR}>Kelas Ajar</InputText>
            <InputText bind:value={input.KELAS} error={errors.KELAS}>Kelas</InputText>
            <InputText bind:value={input.NAMA_DIKLAT} error={errors.NAMA_DIKLAT}>Nama Diklat</InputText>
            <InputDate bind:value={input.TANGGAL_PERIODE_AWAL} error={errors.TANGGAL_PERIODE_AWAL}>Periode Awal</InputDate>
            <InputDate bind:value={input.TANGGAL_PERIODE_AKHIR} error={errors.TANGGAL_PERIODE_AKHIR}>Periode Akhir</InputDate>
            <InputText bind:value={input.TEMPAT_DIKLAT} error={errors.TEMPAT_DIKLAT}>Tempat Diklat</InputText>
            <InputText bind:value={input.RIWAYAT_DIKLAT} error={errors.RIWAYAT_DIKLAT}>Riwayat Diklat</InputText>
            <InputFile bind:value={input.FOTO} error={errors.FOTO}></InputFile>
            <TextArea bind:value={input.KETERANGAN} error={errors.KETERANGAN}>Keterangan</TextArea>
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
