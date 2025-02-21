<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class FilmFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //Creamos un objeto de tipo Faker
        $faker = Faker::create();
        //Obtenemos el último id insertado
        $lastInsertedId = DB::table("films")->max("id");
        //Generamos 20 elementos de tipo aleatorio.
        for ($i = 0; $i < 10; $i++) {
            DB::table("films")->insert([
                "name" => $faker->sentence(3),
                "year" => $faker->year(),
                "genre" => $faker->word(),
                "country" => $faker->countryCode,
                "duration" => $faker->numberBetween(10, 999),
                "img_url" => $faker->imageUrl(640, 480, "movies", true),
                "created_at" => now(),
                "updated_at" => now(),
            ]);
        }
    }
}
