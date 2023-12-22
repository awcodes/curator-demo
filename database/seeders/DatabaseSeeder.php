<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Awcodes\Curator\Models\Media;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Adam Weston',
             'email' => 'adam.weston@titlemax.com',
         ]);

        $this->call(MediaSeeder::class);

         \App\Models\Post::factory(50)->create()->each(function($post) {
             $post->product_pictures()->attach(Media::query()->inRandomOrder()->limit(rand(3,10))->pluck('id')->toArray());
         });
    }
}
