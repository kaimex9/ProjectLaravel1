<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ActorFakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Creamos un objeto de tipo Faker
        $faker = Faker::create();
        //Obtenemos el último id insertado
        $lastInsertedId = DB::table("actors")->max("id");
        //Generamos 20 elementos de tipo aleatorio.
        for ($i = 0; $i < 10; $i++) {
            DB::table("actors")->insert([
                "name" => $faker->sentence(3), // Nombre aleatorio de 3 palabras
                "surname" => $faker->lastName(), // Un apellido en lugar de un año
                "birthdate" => $faker->date("Y-m-d"), // Fecha realista en formato 'YYYY-MM-DD'
                "country" => $faker->countryCode, // Código de país (ej: "US", "ES")
                "img_url" => $faker->imageUrl(640, 480, "movies", true),
                "created_at" => now(),
                "updated_at" => now(),
            ]);
        }
    }
}
