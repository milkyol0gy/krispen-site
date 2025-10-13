<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SermonRecordSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('sermon_records')->insert([
            [
                'title' => 'Faith and Perseverance',
                'youtube_link' => 'https://www.youtube.com/watch?v=EdypfPZvi2U',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Living with Purpose',
                'youtube_link' => 'https://www.youtube.com/watch?v=qlRvd3_kpPc',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Power of Prayer',
                'youtube_link' => 'https://www.youtube.com/watch?v=cv9PG8XQCkg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Grace and Forgiveness',
                'youtube_link' => 'https://www.youtube.com/watch?v=NBhYPp-hN5g',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Overcoming Fear',
                'youtube_link' => 'https://www.youtube.com/watch?v=zl32r0KGZrs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Hope in Difficult Times',
                'youtube_link' => 'https://www.youtube.com/watch?v=UWxP756cQJE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Walking in Love',
                'youtube_link' => 'https://www.youtube.com/watch?v=73N43h8R670',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Trusting God’s Plan',
                'youtube_link' => 'https://www.youtube.com/watch?v=H0xmQmskXPg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Gift of Salvation',
                'youtube_link' => 'https://www.youtube.com/watch?v=H6kaKSk9hIg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Serving Others',
                'youtube_link' => 'https://www.youtube.com/watch?v=q8p_fFbdWYQ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Living by Faith',
                'youtube_link' => 'https://www.youtube.com/watch?v=kQjhVNgESz8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'God’s Unfailing Love',
                'youtube_link' => 'https://www.youtube.com/watch?v=yVO3XUE3d1k',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
