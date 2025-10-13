<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'materials';

    protected $fillable = [
        'title',
        'url',
        'description',
        'published_date',
    ];


    protected $casts = [
        'published_date' => 'date',
    ];
}
