<script>
    import InputText from '../Formulir/InputText.svelte'
    import InputFile from '../Formulir/InputFile.svelte'
    import InputDate from '../Formulir/InputDate.svelte'
    import RadioGroup from '../Formulir/RadioGroup.svelte'
    import SelectObject from '../Formulir/SelectObject.svelte'

    export let input = {
        NAMA_LENGKAP: null,
        'NIS/NIM': null,
        BIDANG_KEAHLIAN: null,
        PROGRAM_KEAHLIAN: null,
        KOMPETENSI_KEAHLIAN: null,
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
    export let errors

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

<div class="p-10">
    <form on:submit|preventDefault={() => submit(input)} class="flex flex-col gap-y-6 items-center">
        <div class="input-container">
            <h1 class="uppercase font-bold text-xl mb-3">Identitas Siswa</h1>

            <InputText bind:value={input['NAMA_LENGKAP']} error={errors['NAMA_LENGKAP']}>Nama Lengkap</InputText>
            <InputText bind:value={input['NIS/NIM']} error={errors['NIS/NIM']}>NIS/NIM</InputText>

            <SelectObject bind:value={input.BIDANG_KEAHLIAN} options={bidangKeahlianOpt} error={errors.BIDANG_KEAHLIAN}>
                Bidang Keahlian
            </SelectObject>
            <SelectObject bind:value={input.PROGRAM_KEAHLIAN} error={errors.PROGRAM_KEAHLIAN} options={programKeahlianOpt}>
                Program Keahlian
            </SelectObject>
            <SelectObject bind:value={input.KOMPETENSI_KEAHLIAN} options={kompKeahlianOpt} error={errors.KOMPETENSI_KEAHLIAN}>
                Kompetensi Keahlian
            </SelectObject>

            <InputText bind:value={input['TEMPAT_LAHIR']} error={errors['TEMPAT_LAHIR']}>Kompetensi Keahlian</InputText>
            <InputText bind:value={input['TANGGAL_LAHIR']} error={errors['TANGGAL_LAHIR']}>Kompetensi Keahlian</InputText>
            <RadioGroup
                bind:value={input['JENIS_KELAMIN']}
                options={{ 'Laki - Laki': 'L', Perempuan: 'P' }}
                error={errors['JENIS_KELAMIN']}>Jenis Kelamin</RadioGroup
            >
            <InputText bind:value={input['AGAMA']} error={errors['AGAMA']}>Agama</InputText>
            <InputText bind:value={input['ALAMAT_LENGKAP']} error={errors['ALAMAT_LENGKAP']}>Kompetensi Keahlian</InputText>
            <InputText bind:value={input['NO_HP']} error={errors['NO_HP']}>Kompetensi Keahlian</InputText>
            <InputText bind:value={input['EMAIL']} error={errors['EMAIL']}>Kompetensi Keahlian</InputText>
            <InputText bind:value={input['HOBBY']} error={errors['HOBBY']}>Hobi</InputText>
            <InputFile bind:value={input['FOTO']} error={errors['FOTO']}></InputFile>
            <InputDate bind:value={input['TANGGAL_MASUK']} error={errors['TANGGAL_MASUK']}>Tanggal Masuk</InputDate>
            <InputDate bind:value={input['TANGGAL_KELUAR']} error={errors['TANGGAL_KELUAR']}>Tanggal Keluar</InputDate>
            <InputText bind:value={input['TEMPAT/DEPARTEMEN_PELAKSANAAN']} error={errors['TEMPAT/DEPARTEMEN_PELAKSANAAN']}>
                Tempat / Departemen Pelaksanaan
            </InputText>
            <h1 class="uppercase font-bold text-xl mb-3 mt-5">Identitas Sekolah</h1>
            <InputText bind:value={input['NAMA_SEKOLAH']} error={errors['NAMA_SEKOLAH']}>Nama Sekolah</InputText>
            <InputText bind:value={input['KABUPATEN/KOTA_SEKOLAH']} error={errors['KABUPATEN/KOTA_SEKOLAH']}>
                Kabupaten Sekolah
            </InputText>
            <RadioGroup
                bind:value={input['STATUS_SEKOLAH']}
                options={{ Negeri: 'Negeri', Swasta: 'Swasta' }}
                error={errors['STATUS_SEKOLAH']}
            >
                Status Sekolah
            </RadioGroup>
            <InputText bind:value={input['NSS']} error={errors['NSS']}>NSS</InputText>
            <InputText bind:value={input['ALAMAT_LENGKAP_SEKOLAH']} error={errors['ALAMAT_LENGKAP_SEKOLAH']}>
                Alamat Lengkap Sekolah
            </InputText>
            <InputText bind:value={input['POSEL_SEKOLAH']} error={errors['POSEL_SEKOLAH']}>Email Sekolah</InputText>
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
