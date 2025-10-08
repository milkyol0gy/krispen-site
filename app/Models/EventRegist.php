<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventRegist extends Model
{
    protected $fillable = [
        'event_id',
        'attandee_name',
        'inviter_name',
        'attandee_phone',
    ];

    // Relationship dengan Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
