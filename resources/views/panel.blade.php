<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Curator Test Suite</title>

        @vite(['resources/css/filament/admin/theme.css'])
        @filamentStyles

        {{ filament()->getTheme()->getHtml() }}
        {{ filament()->getFontHtml() }}

        <style>
            :root {
                --font-family: '{!! filament()->getFontFamily() !!}';
                --sidebar-width: {{ filament()->getSidebarWidth() }};
                --collapsed-sidebar-width: {{ filament()->getCollapsedSidebarWidth() }};
            }
        </style>
    </head>
    <body class="antialiased dark:text-white">
        <livewire:curator-panel
            :accepted-file-types="config('curator.accepted_file_types')"
            default-sort="desc"
            :directory="config('curator.directory')"
            :disk-name="config('curator.disk')"
            :image-crop-aspect-ratio="config('curator.image_crop_aspect_ratio')"
            :image-resize-mode="config('curator.image_resize_mode')"
            :image-resize-target-width="config('curator.image_resize_target_width')"
            :image-resize-target-height="config('curator.image_resize_target_height')"
            :is-limited-to-directory="true"
            :is-tenant-aware="true"
            :is-multiple="true"
            :max-items="null"
            :max-size="config('curator.max_size')"
            :max-width="config('curator.max_width')"
            :min-size="config('curator.min_size')"
            :path-generator="config('curator.path_generator')"
            :rules="[]"
            :selected="[]"
            :should-preserve-filenames="false"
            state-path="this-doesnt-matter"
            :types="[]"
            visibility="public"
            :should-prefetch-files="true"
        />

        @filamentScripts
    </body>
</html>
