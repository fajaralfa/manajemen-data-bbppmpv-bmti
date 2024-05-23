<?php

namespace Database\Factories;

use App\Models\Prakerin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prakerin>
 */
class PrakerinFactory extends Factory
{
    protected $model = Prakerin::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'NAMA LENGKAP' => fake()->name(),
            'NIS/NIM' => fake()->numberBetween(1000, 2000),
            'BIDANG KEAHLIAN' => fake()->randomElement(['REKAYASA PERANGKAT LUNAK', 'TEKNIK KOMPUTER JARINGAN', 'TEKNIK ELEKTRONIKA INDUSTRI']),
            'PROGRAM KEAHLIAN' => fake()->randomElement(['REKAYASA PERANGKAT LUNAK', 'TEKNIK KOMPUTER JARINGAN', 'TEKNIK ELEKTRONIKA INDUSTRI']),
            'KOMPETENSI KEAHLIAN' => fake()->randomElement(['REKAYASA PERANGKAT LUNAK', 'TEKNIK KOMPUTER JARINGAN', 'TEKNIK ELEKTRONIKA INDUSTRI']),
            'TEMPAT LAHIR' => fake()->city(),
            'TANGGAL LAHIR' => fake()->date(),
            'JENIS KELAMIN' => fake()->randomElement(['L', 'P']),
            'AGAMA' => fake()->randomElement(['ISLAM', 'KRISTEN', 'HINDU',]),
            'ALAMAT LENGKAP' => fake()->address(),
            'NO HP' => fake()->phoneNumber(),
            'EMAIL' => fake()->email(),
            'FOTO' => fake()->word(),
            'TANGGAL MASUK' => fake()->date(),
            'TANGGAL KELUAR' => fake()->date(),
            'TEMPAT/DEPARTEMEN PELAKSANAAN' => fake()->city(),
            'NAMA SEKOLAH' => 'SMK ' . fake()->city(),
            'KABUPATEN/KOTA SEKOLAH' => fake()->city(),
            'STATUS SEKOLAH' => fake()->randomElement(['SWASTA', 'NEGERI']),
            'NSS' => fake()->numberBetween(),
            'ALAMAT LENGKAP SEKOLAH' => fake()->city(),
            'POSEL SEKOLAH' => fake()->email(),
            'HOBBY' => fake()->randomElement(['Baca Buku', 'Berenang', 'Lari', 'Ngalamun']),
        ];
    }
}
