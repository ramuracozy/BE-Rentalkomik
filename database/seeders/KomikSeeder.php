<?php

namespace Database\Seeders;

use App\Models\Komik;
use Illuminate\Database\Seeder;

class KomikSeeder extends Seeder
{
    public function run(): void
    {
        Komik::factory()->count(10)->create();
    }
}
