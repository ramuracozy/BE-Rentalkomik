<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\User;
use Database\Seeders\UserSeeder;
use Database\Seeders\KategoriSeeder;
use Database\Seeders\KomikSeeder;
use Database\Seeders\AnggotaSeeder;
use Database\Seeders\PeminjamanSeeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
        ]);

        $this->call([
            UserSeeder::class,
            KategoriSeeder::class,
            KomikSeeder::class,
            AnggotaSeeder::class,
            PeminjamanSeeder::class,
        ]);
    }
}
