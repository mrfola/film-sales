<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomDigit(),
            'genre_id' => array_rand(Genre::pluck('id')->toArray()), // password
            'average_rating' => $this->faker->randomElement([1,2,3,4,5]),
        ];
    }
}
