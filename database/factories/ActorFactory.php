<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActorFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->firstName(), // Nombre aleatorio
            'surname' => $this->faker->lastName(), // Apellido aleatorio
            'birthdate' => $this->faker->date('Y-m-d'), // Fecha de nacimiento
            'country' => $this->faker->countryCode, // Código de país
            'img_url' => $this->faker->imageUrl(640, 480, 'movies', true), // URL de imagen
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
