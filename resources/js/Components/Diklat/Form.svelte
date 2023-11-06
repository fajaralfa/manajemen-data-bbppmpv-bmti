<script>
    import { page } from '@inertiajs/svelte'
    import axios from 'axios'
    import InputText from '../Formulir/InputText.svelte'
    import InputNumber from '../Formulir/InputNumber.svelte'
    import InputEmail from '../Formulir/InputEmail.svelte'
    import TextArea from '../Formulir/TextArea.svelte'
    import RadioGroup from '../Formulir/RadioGroup.svelte'
    import InputDate from '../Formulir/InputDate.svelte'
    import InputFile from '../Formulir/InputFile.svelte'
    import SelectObject from '../Formulir/SelectObject.svelte'
    import SelectNestedObject from '../Formulir/SelectNestedObject.svelte'

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
        NPSN_SEKOLAH: null,
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

    let dataSekolah
    async function getDataSekolah() {
        dataSekolah = await axios.get('/api/sekolah/get-nama-npsn')
        return dataSekolah.data
    }
    getDataSekolah()

    let keahlian = {
        // bidang keahlian
        'TEKNOLOGI INFORMASI': {
            // program keahlian
            'PENGEMBANGAN PERANGKAT LUNAK DAN GIM': {
                // kompetensi keahlian
                'REKAYASA PERANGKAT LUNAK': true,
                'PENGEMBANGAN GIM': true,
                'SISTEM INFORMASI, JARINGAN DAN APLIKASI': true,
            },
            '3 DIMENSI': {
                'REKAYASA LUNAK': true,
                'PENGEMBANGAN GIM': true,
                'SISTEM INFORMASI, JARINGAN DAN APLIKASI': true,
            },
        },
        'TEKNOLOGI KOMUNIKASI': {
            NELEPON: {
                'REKAYASA PERANGKAT LUNAK': true,
                'PENGEMBANGAN GIM': true,
                'SISTEM INFORMASI, JARINGAN DAN APLIKASI': true,
            },
        },
    }

    let bidangKeahlianOpt = {}
    let programKeahlianOpt = {}
    let kompKeahlianOpt = {}

    bidangKeahlianOpt = keahlian
    $: {
        programKeahlianOpt = bidangKeahlianOpt[input.BIDANG_KEAHLIAN] ?? {}
        kompKeahlianOpt = programKeahlianOpt[input.PROGRAM_KEAHLIAN] ?? {}
    }
</script>

<div class="p-2">
    {#if $page.props?.flash.message}
        <div class="bg-red-600">{$page.props.flash.message}</div>
    {/if}

    <form on:submit|preventDefault={() => submit(input)} class="flex flex-col gap-y-10 rounded-xl bg-glass-dark px-16 py-5">
        <div class="input-container grid grid-flow-col grid-cols-2 gap-x-10 gap-y-4">
            <InputText bind:value={input.NAMA_LENGKAP} error={errors.NAMA_LENGKAP}>Nama Lengkap</InputText>

            <SelectNestedObject bind:value={input.BIDANG_KEAHLIAN} options={bidangKeahlianOpt} error={errors.BIDANG_KEAHLIAN}>
                Bidang Keahlian
            </SelectNestedObject>
            <SelectNestedObject bind:value={input.PROGRAM_KEAHLIAN} error={errors.PROGRAM_KEAHLIAN} options={programKeahlianOpt}>
                Program Keahlian
            </SelectNestedObject>
            <SelectNestedObject
                bind:value={input.KOMPETENSI_KEAHLIAN}
                options={kompKeahlianOpt}
                error={errors.KOMPETENSI_KEAHLIAN}
            >
                Kompetensi Keahlian
            </SelectNestedObject>

            <InputNumber bind:value={input.NIK} error={errors.NIK}>NIK</InputNumber>
            <InputNumber bind:value={input.NUPTK} error={errors.NUPTK}>NUPTK</InputNumber>
            <InputNumber bind:value={input.NIP} error={errors.NIP}>NIP</InputNumber>
            <InputNumber bind:value={input.NO_UKG} error={errors.NO_UKG}>No. UKG</InputNumber>
            <InputText bind:value={input.TEMPAT_LAHIR} error={errors.TEMPAT_LAHIR}>Tempat Lahir</InputText>
            <InputDate bind:value={input.TANGGAL_LAHIR} error={errors.TANGGAL_LAHIR}>Tanggal Lahir</InputDate>
            <InputText bind:value={input.USIA} error={errors.USIA}>Usia</InputText>
            <RadioGroup bind:value={input.KELAMIN} options={{ 'Laki - Laki': 'L', Perempuan: 'P' }} error={errors.KELAMIN}
                >Jenis Kelamin</RadioGroup
            >
            <InputText bind:value={input.JABATAN} error={errors.JABATAN}>Jabatan</InputText>
            <InputText bind:value={input.GOLONGAN} error={errors.GOLONGAN}>Golongan</InputText>
            <InputNumber bind:value={input.NOMOR_HP} error={errors.NOMOR_HP}>Nomor HP</InputNumber>
            <InputEmail bind:value={input.EMAIL} error={errors.EMAIL}>Email</InputEmail>
            <InputText bind:value={input.MAPEL_AJAR} error={errors.MAPEL_AJAR}>Mapel Ajar</InputText>
            <InputText bind:value={input.KELAS_AJAR} error={errors.KELAS_AJAR}>Kelas Ajar</InputText>
            <InputText bind:value={input.KELAS} error={errors.KELAS}>Kelas</InputText>
            <SelectObject bind:value={input.NPSN_SEKOLAH} options={dataSekolah?.data}>Nama Sekolah</SelectObject>
            <InputText bind:value={input.NAMA_DIKLAT} error={errors.NAMA_DIKLAT}>Nama Diklat</InputText>
            <InputDate bind:value={input.TANGGAL_PERIODE_AWAL} error={errors.TANGGAL_PERIODE_AWAL}>Periode Awal</InputDate>
            <InputDate bind:value={input.TANGGAL_PERIODE_AKHIR} error={errors.TANGGAL_PERIODE_AKHIR}>Periode Akhir</InputDate>
            <InputText bind:value={input.TEMPAT_DIKLAT} error={errors.TEMPAT_DIKLAT}>Tempat Diklat</InputText>
            <InputText bind:value={input.RIWAYAT_DIKLAT} error={errors.RIWAYAT_DIKLAT}>Riwayat Diklat</InputText>
            <InputFile bind:value={input.FOTO} error={errors.FOTO}>Foto</InputFile>
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
