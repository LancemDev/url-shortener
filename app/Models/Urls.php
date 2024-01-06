<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Urls extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'url',
        'short_url',
        'description',
        'user_id',
    ];

    public static function generateShortUrl()
    {
        do{
            $prefix = "bit.ly/";
            $short_url = $prefix.Str::random(6);
        } while (self::where('short_url', $short_url)->exists());

        return $short_url;
    }
}
