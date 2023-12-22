<?php

namespace App\Models;

use Awcodes\Curator\Models\Media;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomMedia extends Media
{
    use HasFactory;

    protected $table = 'media';

    public static function test(): string
    {
        return 'test';
    }
}
