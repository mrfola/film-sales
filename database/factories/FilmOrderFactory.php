<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $film_id = Film::get();
        return [
            'film_id' => array_rand(Film::pluck('id')->toArray()),
            'order_id' => array_rand(Order::pluck('id')->toArray()),
        ];
    }
}
