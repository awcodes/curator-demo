@php
    $post = \App\Models\Post::first();
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Curator Test Suite</title>

        @vite(['resources/css/app.css'])
    </head>
    <body class="antialiased dark:text-white">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <p>Relationship</p>
                <x-curator-glider :media="$post->featured_image" format="webp" />

                <p class="mt-8">Multiple</p>
                <div class="grid grid-cols-3 gap-6">
                @foreach ($post->product_images as $image)
                    <div>
                        <x-curator-glider :media="$image" />
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </body>
</html>
