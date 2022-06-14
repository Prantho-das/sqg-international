<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;


    protected $guarded = [];


    protected $casts = [
        'phone' => 'array',
        'social_links' => 'array'
    ];
}
