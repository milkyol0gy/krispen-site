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
            ],
            [
                'title' => 'Doa Syafaat 24 Jam',
                'description' => 'Kegiatan doa yang berkelanjutan selama 24 jam dengan bergantian jemaat untuk membawa berbagai pergumulan kepada Tuhan.',
                'start_time' => Carbon::create(2025, 12, 1, 6, 0, 0),
                'end_time' => Carbon::create(2025, 12, 2, 6, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Pelatihan Kepemimpinan Kristen',
                'description' => 'Workshop intensif untuk mengembangkan jiwa kepemimpinan yang berdasarkan prinsip-prinsip Alkitab.',
                'start_time' => Carbon::create(2025, 12, 7, 8, 30, 0),
                'end_time' => Carbon::create(2025, 12, 7, 17, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Natal Bersama Keluarga Krispen',
                'description' => 'Perayaan Natal yang hangat bersama seluruh keluarga besar gereja dengan drama, nyanyian, dan perjamuan kasih.',
                'start_time' => Carbon::create(2025, 12, 24, 18, 0, 0),
                'end_time' => Carbon::create(2025, 12, 24, 22, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Ibadah Malam Tahun Baru',
                'description' => 'Menyambut tahun baru dengan ibadah syukur dan doa berkat untuk tahun yang akan datang.',
                'start_time' => Carbon::create(2025, 12, 31, 21, 0, 0),
                'end_time' => Carbon::create(2026, 1, 1, 1, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Sekolah Alkitab Intensif',
                'description' => 'Program belajar Alkitab secara mendalam dengan metode hermeneutika dan eksposisi yang sistematis.',
                'start_time' => Carbon::create(2026, 1, 15, 19, 0, 0),
                'end_time' => Carbon::create(2026, 3, 15, 21, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Misi Penginjilan Kampus',
                'description' => 'Kegiatan penginjilan khusus di kampus-kampus untuk menjangkau mahasiswa dengan Injil Kristus.',
                'start_time' => Carbon::create(2026, 2, 10, 10, 0, 0),
                'end_time' => Carbon::create(2026, 2, 14, 16, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Seminar Pernikahan Kristen',
                'description' => 'Persiapan menuju pernikahan yang kudus dengan pemahaman Alkitab tentang keluarga dan rumah tangga.',
                'start_time' => Carbon::create(2026, 2, 21, 9, 0, 0),
                'end_time' => Carbon::create(2026, 2, 22, 17, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Camp Rohani Anak-Anak',
                'description' => 'Perkemahan rohani yang menyenangkan untuk anak-anak dengan berbagai permainan edukatif dan cerita Alkitab.',
                'start_time' => Carbon::create(2026, 3, 20, 8, 0, 0),
                'end_time' => Carbon::create(2026, 3, 22, 16, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Konferensi Pelayanan Wanita',
                'description' => 'Konferensi khusus untuk wanita dengan tema pengembangan diri dan pelayanan dalam keluarga dan gereja.',
                'start_time' => Carbon::create(2026, 4, 5, 8, 30, 0),
                'end_time' => Carbon::create(2026, 4, 6, 17, 30, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Pelatihan Tim Musik Gereja',
                'description' => 'Workshop untuk meningkatkan kemampuan tim musik dalam pelayanan pujian dan penyembahan.',
                'start_time' => Carbon::create(2026, 4, 12, 14, 0, 0),
                'end_time' => Carbon::create(2026, 4, 12, 18, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Vigorous Youth Conference',
                'description' => 'Konferensi pemuda dengan pembicara nasional dan internasional untuk membakar semangat melayani Tuhan.',
                'start_time' => Carbon::create(2026, 5, 1, 8, 0, 0),
                'end_time' => Carbon::create(2026, 5, 3, 21, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Perayaan Hari Ibu Kristen',
                'description' => 'Acara spesial untuk menghormati para ibu dengan ibadah syukur dan berbagai kegiatan appreciation.',
                'start_time' => Carbon::create(2026, 5, 10, 15, 0, 0),
                'end_time' => Carbon::create(2026, 5, 10, 18, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Baksos Ramadan Bersama',
                'description' => 'Kegiatan berbagi kasih kepada tetangga muslim saat bulan Ramadan sebagai wujud toleransi dan persaudaraan.',
                'start_time' => Carbon::create(2026, 5, 25, 16, 0, 0),
                'end_time' => Carbon::create(2026, 5, 25, 19, 0, 0),
                'poster_link' => 'events/event.png',
            ],
            [
                'title' => 'Healing Service & Miracle Night',
                'description' => 'Ibadah khusus dengan fokus pada kesembuhan ilahi dan mujizat Tuhan dalam kehidupan jemaat.',
                'start_time' => Carbon::create(2026, 6, 15, 19, 0, 0),
                'end_time' => Carbon::create(2026, 6, 15, 22, 0, 0),
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
