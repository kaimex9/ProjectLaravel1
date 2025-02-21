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