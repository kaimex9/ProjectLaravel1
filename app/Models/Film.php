<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class film extends Model
{
    use HasFactory;
    protected $casts = [
        'name' => 'string',
        'year' => 'integer',
        'genre' => 'string',
        'country' => 'string',
        'duration' => 'integer',
        'img_url' => 'string',
    ];


}
