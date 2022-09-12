<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'user_id_fk' => $this->faker->numberBetween(1, 3),
            'unique_id' => $this->faker->uuid(),
            'title' => $this->faker->sentence(3),
            'body' => $this->faker->paragraph(5),
        ];
    }
}
