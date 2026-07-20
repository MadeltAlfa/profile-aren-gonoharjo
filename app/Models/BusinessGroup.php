<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessGroup extends Model
{
    use HasFactory;

    protected $table = 'business_group';

    protected $fillable = [
        'group_name',
        'description',
        'structure_json',
        'logo',
    ];

    protected $casts = [
        'structure_json' => 'array',
    ];
}
