<script>
    import InputText from '../Formulir/InputText.svelte'
    import TextArea from '../Formulir/TextArea.svelte'
    import { page } from '@inertiajs/svelte'

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
            <InputText bind:value={input.NAMA_LENGKAP} error={errors.NAMA_LENGKAP}>Nama Lengkap:</InputText>
            <div>
                <label for="kompetensi">Kompetensi Keahlian:</label>
                <select
                    name="kompetensi"
                    class="select select-bordered w-full max-w-xs"
                    bind:value={input['KOMPETENSI_KEAHLIAN']}
                >
                    <option value="multimedia">Multimedia</option>
                    <option value="tkj">Tkj</option>
                    <option value="rpl">Rpl</option>
                </select>
            </div>
            <div>
                <label for="program">Program Keahlian:</label>
                <select name="program" class="select select-bordered w-full max-w-xs" bind:value={input['PROGRAM_KEAHLIAN']}>
                    <option value="multimedia">Multimedia</option>
                    <option value="tkj">Tkj</option>
                    <option value="rpl">Rpl</option>
                </select>
            </div>
            <div>
                <label for="bidang">Bidang Keahlian:</label>
                <select name="bidang" class="select select-bordered w-full max-w-xs" bind:value={input['BIDANG_KEAHLIAN']}>
                    <option value="multimedia">Multimedia</option>
                    <option value="tkj">Tkj</option>
                    <option value="rpl">Rpl</option>
                </select>
            </div>
            <InputText bind:value={input.NIK} error={errors.NIK}>NIK:</InputText>
            <InputText bind:value={input.NUPTK} error={errors.NUPTK}>NUPTK:</InputText>
            <InputText bind:value={input.NIP} error={errors.NIP}>NIP:</InputText>
            <InputText bind:value={input.NO_UKG} error={errors.NO_UKG}>No UKg:</InputText>
            <InputText bind:value={input.TEMPAT_LAHIR} error={errors.TEMPAT_LAHIR}>Tempat Lahir:</InputText>
            <div>
                <label for="taggal_lahir">Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" class="input w-full max-w-xs" bind:value={input['TANGGAL_LAHIR']} />
            </div>
            <InputText bind:value={input.USIA} error={errors.USIA}>Usia:</InputText>
            <div>
                <label for="jenis_kelamin">Jenis kelamin:</label>
                <div class="flex gap-3">
                    <input type="radio" name="jenis_kelamin" value="L" class="radio" bind:group={input['KELAMIN']} />
                    <label for="jenis_kelamin">Laki-laki</label>
                    <input type="radio" name="jenis_kelamin" value="P" class="radio" bind:group={input['KELAMIN']} />
                    <label for="jenis_kelamin">Perempuan</label>
                </div>
            </div>
            <InputText bind:value={input.JABATAN} error={errors.JABATAN}>Jabatan:</InputText>
            <InputText bind:value={input.GOLONGAN} error={errors.GOLONGAN}>Golongan:</InputText>
            <InputText bind:value={input.NOMOR_HP} error={errors.NOMOR_HP}>Nomor HP:</InputText>
            <InputText bind:value={input.EMAIL} error={errors.EMAIL}>Email:</InputText>
            <InputText bind:value={input.MAPEL_AJAR} error={errors.MAPEL_AJAR}>Mapel Ajar:</InputText>
            <InputText bind:value={input.KELAS_AJAR} error={errors.KELAS_AJAR}>Kelas Ajar:</InputText>
            <InputText bind:value={input.KELAS} error={errors.KELAS}>Kelas:</InputText>
            <InputText bind:value={input.NAMA_DIKLAT} error={errors.NAMA_DIKLAT}>Nama Diklat:</InputText>
            <div>
                <label for="periode_awal">Periode Awal:</label>
                <input type="date" name="periode_awal" class="input w-full max-w-xs" bind:value={input['TANGGAL_PERIODE_AWAL']} />
            </div>
            <div>
                <label for="periode_akhir">Periode Akhir:</label>
                <input
                    type="date"
                    name="periode_akhir"
                    class="input w-full max-w-xs"
                    bind:value={input['TANGGAL_PERIODE_AKHIR']}
                />
            </div>
            <InputText bind:value={input.TEMPAT_DIKLAT} error={errors.TEMPAT_DIKLAT}>Tempat Diklat:</InputText>
            <InputText bind:value={input.RIWAYAT_DIKLAT} error={errors.RIWAYAT_DIKLAT}>Riwayat Diklat:</InputText>
            <div>
                <label for="foto">Foto:</label>
                <input
                    type="file"
                    name="foto"
                    class="file-input file-input-bordered w-full max-w-xs"
                    on:input={(e) => (input['FOTO'] = e.target.files[0])}
                />
            </div>
            <TextArea bind:value={input.KETERANGAN} error={errors.KETERANGAN}>Keterangan:</TextArea>
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
