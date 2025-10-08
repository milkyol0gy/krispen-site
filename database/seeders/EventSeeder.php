<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $events = [
            [
                'title' => 'Ibadah Pemuda Krispen',
                'description' => 'Ibadah khusus untuk remaja dan pemuda dengan musik worship yang inspiratif dan pesan yang menyentuh hati.',
                'start_time' => Carbon::create(2025, 10, 15, 19, 0, 0),
                'end_time' => Carbon::create(2025, 10, 15, 21, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Retreat Keluarga Berkat',
                'description' => 'Waktu khusus untuk keluarga membangun hubungan yang lebih erat dengan Tuhan dan sesama melalui berbagai aktivitas rohani.',
                'start_time' => Carbon::create(2025, 10, 18, 8, 0, 0),
                'end_time' => Carbon::create(2025, 10, 20, 17, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Seminar Keuangan Kristen',
                'description' => 'Belajar mengelola keuangan dengan prinsip-prinsip Alkitab untuk kehidupan yang berkat dan berkelimpahan.',
                'start_time' => Carbon::create(2025, 10, 25, 14, 0, 0),
                'end_time' => Carbon::create(2025, 10, 25, 17, 30, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Konser Pujian dan Penyembahan',
                'description' => 'Malam pujian dan penyembahan dengan berbagai band dan penyanyi rohani untuk memuliakan nama Tuhan.',
                'start_time' => Carbon::create(2025, 11, 2, 18, 0, 0),
                'end_time' => Carbon::create(2025, 11, 2, 21, 30, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Bakti Sosial Komunitas',
                'description' => 'Kegiatan pelayanan kepada masyarakat sekitar dengan pembagian sembako dan layanan kesehatan gratis.',
                'start_time' => Carbon::create(2025, 11, 10, 7, 0, 0),
                'end_time' => Carbon::create(2025, 11, 10, 13, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Kelas Pemuridan Tingkat Lanjut',
                'description' => 'Program pembinaan rohani lanjutan untuk memperdalam iman dan mempersiapkan pelayan-pelayan Tuhan yang berkualitas.',
                'start_time' => Carbon::create(2025, 11, 16, 9, 0, 0),
                'end_time' => Carbon::create(2025, 11, 23, 16, 0, 0),
                'poster_link' => 'events/event.png',
            ]
        ];

        foreach ($events as $event) {
            Event::create([
                'title' => $event['title'],
                'description' => $event['description'],
                'start_time' => $event['start_time'],
                'end_time' => $event['end_time'],
                'poster_link' => $event['poster_link'],
            ]);
        }
    }
}
