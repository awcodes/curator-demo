<?php

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(app(Media::class)->getTable(), function (Blueprint $table) {
            $table->id();
            $table->string('disk')->default('public');
            $table->string('directory')->nullable();
            $table->string('visibility')->default('public');
            $table->string('name');
            $table->string('path');
            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->unsignedInteger('size')->nullable();
            $table->string('type')->default('image');
            $table->string('ext');
            $table->string('alt')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('caption')->nullable();
            $table->text('exif')->nullable();
            $table->longText('curations')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(app(Media::class)->getTable());
    }
};
