<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomBook extends Model
{
    protected $fillable = [
        'user_name', 'facilitator_name', 'event_name', 
        'number_of_people', 'event_date', 'start_time', 'required_equipment'
    ];
}
