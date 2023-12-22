<?php

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(app(Media::class)->getTable(), function (Blueprint $table) {
            $table->string('visibility')->default('public')->after('disk');
        });
    }

    public function down(): void
    {
        Schema::table(app(Media::class)->getTable(), function(Blueprint $table) {
            $table->dropColumn(['visibility']);
        });
    }
};
