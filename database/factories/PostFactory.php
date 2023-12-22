<?php

namespace Database\Factories;

use App\Models\Post;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'featured_image_id' => Media::query()->inRandomOrder()->first()->id,
            'product_images' => Media::query()->inRandomOrder()->limit(rand(3,10))->pluck('id')->toArray(),
            'products' => [
                [
                    'name' => $this->faker->word,
                    'image' => Media::query()->inRandomOrder()->limit(rand(3,10))->pluck('id')->toArray(),
                ],
                [
                    'name' => $this->faker->word,
                    'image' => Media::query()->inRandomOrder()->first()->id,
                ],
            ],
            'content' => null,
        ];
    }
}
