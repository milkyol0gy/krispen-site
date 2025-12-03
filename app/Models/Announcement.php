<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;
    
    protected $table = 'announcements';

    protected $fillable = [
        'user_id',
        'headline',
        'details',
        'start_air',
        'end_air',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}