<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;

class FilmFakerSeeder extends Seeder
{
        /**
     * Run the database seeds.
     */
    public function run()
    {
        // Generar 10 registros usando la factory
        Film::factory()->count(10)->create();
    }
    
}
