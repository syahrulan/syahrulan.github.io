<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        return [
            'img' => 'videohome/video1.mp4' 
            'title' => fake()->sentence(20),
            'slug' => Str::slug(fake()->sentence()),
            'body' => fake()->sentence(200)
        ];
    }
}
