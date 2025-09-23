@extends('base.base-admin')

@section('content')
<div class="p-8 pe-8 xl:pe-24">
    {{-- Header Section --}}
    <div class="flex flex-col md:flex-row mb-6 gap-x-10 max-w-[1200px] flex-wrap gap-y-4 ">
        <h1 class="font-bold text-xl lg:text-3xl">Event List</h1>

        {{-- Create Event --}}
        <a href="#" {{--  {{ route('add-event') }} --}}
            class="ms-0 md:ms-auto bg-blue-500 text-white font-bold rounded-lg shadow px-5 py-2 flex items-center justify-center">
            + New Event
        </a>
    </div>

    {{-- Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 max-w-[1200px]">
        @foreach ($events as $event)
            <div class="flex flex-col min-h-[170px] max-w-[400px] bg-[#F7F6FA] rounded-lg overflow-hidden">
                <div class="flex p-5 gap-x-4">
                    <div class="w-auto">
                        <h2 class="font-bold text-lg mb-1">
                            {{-- {{ $event->event_name }} --}}
                        </h2>
                        <p class="text-sm text-gray-500">
                            {{-- {{ \Carbon\Carbon::parse($event['date_time'])->translatedFormat('j F Y') }} --}}
                        </p>
                    </div>
                </div>
                <hr class="mt-auto">
                <a href="#" {{-- {{ route('event.detail', $event) }} --}}
                    class="bg-blue-100 w-full h-[40px] flex items-center justify-center transition-all duration-200 hover:bg-blue-500 hover:text-white">Detail</a>
            </div>
        @endforeach
    </div>
</div>
@endsection