<?php

namespace App\Exports;

use App\Models\EventRegist;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EventParticipantsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $eventId;

    public function __construct($eventId)
    {
        $this->eventId = $eventId;
    }

    public function collection()
    {
        return EventRegist::where('event_id', $this->eventId)
            ->with('event')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No',
            'Name',
            'Email',
            'Phone',
            'Event Title',
            'Registration Date'
        ];
    }

    public function map($participant): array
    {
        static $counter = 0;
        $counter++;

        return [
            $counter,
            $participant->name,
            $participant->email,
            $participant->phone,
            $participant->event->title ?? 'N/A',
            $participant->created_at->format('d/m/Y H:i')
        ];
    }
}