<?php

namespace App\Glider;

use Awcodes\Curator\Glide\GliderFallback;

class AvatarGliderFallback extends GliderFallback
{
    public function getAlt(): string
    {
        return 'No photo available';
    }

    public function getKey(): string
    {
        return 'avatar_fallback';
    }

    public function getSource(): string
    {
        return asset('avatar-placeholder.png');
    }

    public function getType(): string
    {
        return 'image/webp';
    }

    public function getHeight(): int
    {
        return 100;
    }

    public function getWidth(): int
    {
        return 100;
    }
}
