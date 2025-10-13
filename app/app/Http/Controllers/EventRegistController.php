<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventRegist;

class EventRegistController extends Controller
{
    public function create($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('events.register', compact('event'));
    }

    public function store(Request $request, $eventId)
    {
        $request->validate([
            'attandee_name' => 'required|string|max:255',
            'inviter_name' => 'nullable|string|max:255',
            'attandee_phone' => 'nullable|string|max:20'
        ]);

        $event = Event::findOrFail($eventId);

        EventRegist::create([
            'event_id' => $eventId,
            'attandee_name' => $request->attandee_name,
            'inviter_name' => $request->inviter_name,
            'attandee_phone' => $request->attandee_phone
        ]);

        return redirect()->route('events.register.success', $eventId);
    }

    public function success($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('events.register-success', compact('event'));
    }
}