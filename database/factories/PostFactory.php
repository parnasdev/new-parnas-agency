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
            'user_id' => 1,
            'title' => $this->faker->title,
            'description'  => $this->faker->realText(200),
            'body' => $this->faker->realText(1000),
            'pin' => false,
            'comment' => false,
            'post_type' => 'post',
            'status_id' => 1,
        ];
    }
}
