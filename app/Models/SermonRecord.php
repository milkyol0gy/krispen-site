<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SermonRecord extends Model
{
    protected $table = 'sermon_records';
    protected $fillable = [
        'title',
        'youtube_link',
    ];
}
