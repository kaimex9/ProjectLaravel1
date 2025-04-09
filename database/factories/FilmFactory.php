<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    public function definition()
    {
        $genres = ["thriller", "action", "drama", "love values"];

        return [
            'name' => $this->faker->sentence(3),
            'year' => $this->faker->year(),
            'genre' => $this->faker->randomElement($genres),
            'country' => $this->faker->countryCode,
            'duration' => $this->faker->numberBetween(10, 999),
            'img_url' => $this->faker->imageUrl(640, 480, 'movies', true),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
