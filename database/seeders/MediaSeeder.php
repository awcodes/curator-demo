<?php

namespace Database\Seeders;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class MediaSeeder extends Seeder
{
    use withoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $this->cleanStorage();

        Media::factory(3)->directory('videos')->type('video')->create();
        Media::factory(10)->directory('pdfs')->type('pdf')->create();
        Media::factory(10)->directory('svgs')->type('svg')->create();
        Media::factory(20)->directory('featured-images')->create();
        Media::factory(20)->directory('product-images')->create();
        Media::factory(20)->directory('product-pictures')->create();
        Media::factory(20)->directory('products')->create();
        Media::factory(10)->directory('authors')->create();
        Media::factory(2)->directory('media/nested')->create();
        Media::factory(2)->directory('media/nested/nested')->create();
        Media::factory(10)->create();
    }

    protected function cleanStorage(): void
    {
        $directories = Storage::disk("public")->allDirectories();

        collect($directories)->each(function ($dir) {
            Storage::disk("public")->deleteDirectory($dir);
        });

        $files = Storage::disk("public")->allFiles();

        collect($files)->each(function ($file) {
            if ($file !== ".gitignore") {
                Storage::disk("public")->delete($file);
            }
        });
    }
}
