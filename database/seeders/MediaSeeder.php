<?php

namespace Database\Seeders;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Ramsey\Uuid\Uuid;
use function Awcodes\Curator\is_media_resizable;

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
        Storage::disk('public')->deleteDirectory('media');

        $faker = (new \Faker\Factory)->create();
        $files = File::files(database_path() . '/seeders/fixtures/');

        if ($files) {
            foreach ($files as $file) {

                $image = Image::make($file->getRealPath());

                if (is_media_resizable($image->extension)) {
                    $width = $image->getWidth();
                    $height = $image->getHeight();
                }

                $filename = Uuid::uuid4()->toString();

                $media = Media::create(array_merge([
                    'disk' => config('curator.disk'),
                    'directory' => config('curator.directory'),
                    'name' => $filename,
                    'path' => config('curator.directory') . '/' . $filename . '.' . $image->extension,
                    'width' => $width ?? null,
                    'height' => $height ?? null,
                    'size' => $image->filesize(),
                    'type' => $image->mime(),
                    'ext' => $image->extension,
                    'alt' => $faker->words(rand(3,5), true),
                ], $this->getRandomTimestamps()));

                Storage::disk(config('curator.disk'))->put($media->path, $image->encode(null, '80'));
            }
        }
    }

    function getRandomTimestamps($backwardDays = -800): array
    {
        $backwardCreatedDays = rand($backwardDays, 0);
        $backwardUpdatedDays = rand($backwardCreatedDays + 1, 0);

        return [
            'created_at' => \Carbon\Carbon::now()->addDays($backwardCreatedDays)->addMinutes(rand(0,
                60 * 23))->addSeconds(rand(0, 60)),
            'updated_at' => \Carbon\Carbon::now()->addDays($backwardUpdatedDays)->addMinutes(rand(0,
                60 * 23))->addSeconds(rand(0, 60))
        ];
    }
}
