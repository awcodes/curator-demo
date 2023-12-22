<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'product_images' => 'array',
        'products' => 'array',
    ];

//    protected $with = [
//        'featured_image',
//    ];

    public function featured_image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'featured_image_id', 'id');
    }

    public function product_pictures(): BelongsToMany
    {
        return $this->belongsToMany(Media::class, 'media_post', 'post_id', 'media_id')->withPivot('order')->orderBy('order');
    }
}
