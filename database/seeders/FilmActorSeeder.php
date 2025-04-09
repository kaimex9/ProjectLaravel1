<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Models\Actor;

class FilmActorSeeder extends Seeder
{
    public function run(): void
    {
        // Asegurar que al menos una película tenga entre 1 y 3 actores
        $film = Film::inRandomOrder()->first(); // Seleccionar una película aleatoria
        $actors = Actor::inRandomOrder()->limit(rand(1, 3))->get(); // Seleccionar entre 1 y 3 actores aleatorios

        foreach ($actors as $actor) {
            $film->actors()->attach($actor->id, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Continuar con relaciones aleatorias
        for ($i = 0; $i < 10; $i++) {
            $randomFilm = Film::inRandomOrder()->first(); // Película aleatoria
            $randomActor = Actor::inRandomOrder()->first(); // Actor aleatorio

            $randomFilm->actors()->attach($randomActor->id, [
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}