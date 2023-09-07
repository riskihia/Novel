<?php

namespace Database\Factories;

use App\Models\Novel;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Novel>
 */
class NovelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'avatar' => fake()->filePath(),
            'judul' => fake()->name(),
            'link' => fake()->url(),
            'sinopsis' => fake()->text(500), // Generates a random text with up to 500 characters.
            'author_name' => fake()->name(),
            'status' => fake()->randomElement(['hiatus', 'completed', 'ongoing']),
        ];
    }
    public function configure()
    {
        return $this->afterCreating(function (Novel $novel) {
            $tags = Tag::factory(rand(1, 3))->create();
            $novel->tags()->attach($tags);
        });
    }
    
}
