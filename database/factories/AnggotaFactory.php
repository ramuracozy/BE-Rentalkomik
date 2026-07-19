<?php

namespace Database\Factories;

use App\Models\Anggota;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Anggota>
 */
class AnggotaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'no_hp' => fake()->phoneNumber(),
            'alamat' => fake()->address(),
            'tanggal_daftar' => fake()->date(),
        ];
    }
}
