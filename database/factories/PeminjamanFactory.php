<?php

namespace Database\Factories;

use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Anggota;
use App\Models\Komik;

/**
 * @extends Factory<Peminjaman>
 */
class PeminjamanFactory extends Factory
{

    public function definition(): array
    {
        return [
            'anggota_id' => Anggota::factory(),
            'komik_id' => Komik::factory(),
            'tanggal_pinjam' => fake()->date(),
            'tanggal_kembali' => fake()->optional()->date(),
            'status' => fake()->randomElement(['dipinjam', 'dikembalikan', 'telat']),
        ];
    }
}
