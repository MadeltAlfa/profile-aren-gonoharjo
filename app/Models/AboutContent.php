<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutContent extends Model
{
    use HasFactory;

    protected $table = 'about_content';

    protected $fillable = [
        'history',
        'vision',
        'mission',
        'production_gallery_json',
    ];

    protected $casts = [
        'production_gallery_json' => 'array',
    ];
}
