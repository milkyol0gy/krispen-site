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
                'poster_link' => 'https://via.placeholder.com/400x300/1a202c/ffffff?text=Ibadah+Pemuda',
            ],
            [
                'title' => 'Retreat Keluarga Berkat',
                'description' => 'Waktu khusus untuk keluarga membangun hubungan yang lebih erat dengan Tuhan dan sesama melalui berbagai aktivitas rohani.',
                'start_time' => Carbon::create(2025, 10, 20, 9, 0, 0),
                'end_time' => Carbon::create(2025, 10, 20, 17, 0, 0),
                'poster_link' => 'https://via.placeholder.com/400x300/2d3748/ffffff?text=Retreat+Keluarga',
            ],
            [
                'title' => 'Seminar Keuangan Kristen',
                'description' => 'Belajar mengelola keuangan dengan prinsip-prinsip Alkitab untuk kehidupan yang berkat dan berkelimpahan.',
                'start_time' => Carbon::create(2025, 11, 1, 9, 0, 0),
                'end_time' => Carbon::create(2025, 11, 1, 12, 0, 0),
                'poster_link' => 'https://via.placeholder.com/400x300/4a5568/ffffff?text=Seminar+Keuangan',
            ],
            [
                'title' => 'Konser Pujian dan Penyembahan',
                'description' => 'Malam pujian dan penyembahan dengan berbagai band dan penyanyi rohani untuk memuliakan nama Tuhan.',
                'start_time' => Carbon::create(2025, 11, 8, 19, 30, 0),
                'end_time' => Carbon::create(2025, 11, 8, 22, 0, 0),
                'poster_link' => 'https://via.placeholder.com/400x300/1a365d/ffffff?text=Konser+Pujian',
            ],
            [
                'title' => 'Bakti Sosial Komunitas',
                'description' => 'Kegiatan pelayanan kepada masyarakat sekitar dengan pembagian sembako dan layanan kesehatan gratis.',
                'start_time' => Carbon::create(2025, 11, 15, 8, 0, 0),
                'end_time' => Carbon::create(2025, 11, 15, 14, 0, 0),
                'poster_link' => 'https://via.placeholder.com/400x300/2c5282/ffffff?text=Bakti+Sosial',
            ],
            [
                'title' => 'Kelas Pemuridan Tingkat Lanjut',
                'description' => 'Program pembinaan rohani lanjutan untuk memperdalam iman dan mempersiapkan pelayan-pelayan Tuhan yang berkualitas.',
                'start_time' => Carbon::create(2025, 11, 22, 10, 0, 0),
                'end_time' => Carbon::create(2025, 11, 22, 15, 0, 0),
                'poster_link' => 'https://via.placeholder.com/400x300/3182ce/ffffff?text=Kelas+Pemuridan',
            ]
        ];

        foreach ($events as $eventData) {
            Event::create([
                'title' => $eventData['title'],
                'description' => $eventData['description'],
                'start_time' => $eventData['start_time'],
                'end_time' => $eventData['end_time'],
                'poster_link' => $eventData['poster_link'],
            ]);
        }
    }
}
