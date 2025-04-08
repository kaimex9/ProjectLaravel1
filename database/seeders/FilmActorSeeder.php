<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asegurar que al menos una película tenga entre 1 y 3 actores
        $filmId = DB::table("films")->inRandomOrder()->value("id"); // Seleccionar una película aleatoria
        $actorIds = DB::table("actors")->inRandomOrder()->limit(rand(1, 3))->pluck("id"); // Seleccionar entre 1 y 3 actores aleatorios

        foreach ($actorIds as $actorId) {
            DB::table("films_actors")->insert([
                "film_id" => $filmId,
                "actor_id" => $actorId,
                "created_at" => now(),
                "updated_at" => now(),
            ]);
        }

        // Continuar con relaciones aleatorias
        for ($i = 0; $i < 10; $i++) {
            DB::table("films_actors")->insert([
                "film_id" => DB::table("films")->inRandomOrder()->value("id"), // ID aleatorio de films
                "actor_id" => DB::table("actors")->inRandomOrder()->value("id"), // ID aleatorio de actors
                "created_at" => now(),
                "updated_at" => now(),
            ]);
        }
    }
}