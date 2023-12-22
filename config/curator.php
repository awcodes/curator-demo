<?php

return [
    'accepted_file_types' => [
        'image/jpeg',
        'image/png',
        'image/webp',
        'image/svg+xml',
        'application/pdf',
        'video/*',
    ],
    'cloud_disks' => [
        's3',
        'cloudinary',
        'imgix'
    ],
    'curation_formats' => [
        'jpg',
        'jpeg',
        'webp',
        'png',
        'avif',
    ],
    'curation_presets' => [
        \Awcodes\Curator\Curations\ThumbnailPreset::class,
    ],
    'directory' => 'media',
    'disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),
    'glide' => [
        'server' => \Awcodes\Curator\Glide\DefaultServerFactory::class,
        'fallbacks' => [
            \App\Glider\AvatarGliderFallback::class
        ],
        'route_path' => 'curator',
    ],
    'image_crop_aspect_ratio' => null,
    'image_resize_mode' => null,
    'image_resize_target_height' => null,
    'image_resize_target_width' => null,
    'is_limited_to_directory' => false,
    'is_tenant_aware' => true,
    'max_size' => 5000,
    'max_width' => 2000,
    'model' => \App\Models\CustomMedia::class,
    'min_size' => 0,
    'path_generator' => null,
    'resources' => [
        'label' => 'Media',
        'plural_label' => 'Media',
        'navigation_group' => null,
        'navigation_icon' => 'heroicon-o-photo',
        'navigation_sort' => null,
        'resource' => \Awcodes\Curator\Resources\MediaResource::class,
        'table_has_grid_layout' => true,
        'table_has_icon_actions' => false,
    ],
    'should_preserve_filenames' => false,
    'should_register_navigation' => true,
    'visibility' => 'public',
];
