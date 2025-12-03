<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CellCommunity extends Model
{
    protected $fillable = [
        'name',
        'type',
        'facilitator_name',
        'contact_info',
        'meeting_schedule'
    ];
}
