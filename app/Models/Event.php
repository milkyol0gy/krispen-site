<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'start_time',
        'end_time',
        'poster_link',
    ];

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function getFormattedDateAttribute()
    {
        if ($this->end_time && $this->start_time->format('Y-m-d') !== $this->end_time->format('Y-m-d')) {
            return $this->start_time->format('M j') . ' - ' . $this->end_time->format('M j');
        }

        return $this->start_time->format('M j');
    }

    public function getFormattedTimeAttribute()
    {
        if ($this->end_time && $this->start_time->format('Y-m-d') === $this->end_time->format('Y-m-d')) {
            return $this->start_time->format('H:i') . ' - ' . $this->end_time->format('H:i');
        }

        return $this->start_time->format('H:i');
    }

    public function eventRegists()
    {
        return $this->hasMany(EventRegist::class);
    }
}
