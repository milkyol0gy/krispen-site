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
                'description' => 'A message on how faith helps us endure trials and grow stronger through perseverance.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Living with Purpose',
                'youtube_link' => 'https://www.youtube.com/watch?v=qlRvd3_kpPc',
                'description' => 'Discovering how to align our daily lives with God’s purpose and calling for us.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Power of Prayer',
                'youtube_link' => 'https://www.youtube.com/watch?v=cv9PG8XQCkg',
                'description' => 'Exploring the importance of prayer in building a personal and powerful relationship with God.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Grace and Forgiveness',
                'youtube_link' => 'https://www.youtube.com/watch?v=NBhYPp-hN5g',
                'description' => 'Understanding the depth of God’s grace and how it enables us to forgive others.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Overcoming Fear',
                'youtube_link' => 'https://www.youtube.com/watch?v=zl32r0KGZrs',
                'description' => 'Learning to replace fear with faith through trust in God’s promises.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Hope in Difficult Times',
                'youtube_link' => 'https://www.youtube.com/watch?v=UWxP756cQJE',
                'description' => 'Finding lasting hope and peace during seasons of uncertainty and hardship.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Walking in Love',
                'youtube_link' => 'https://www.youtube.com/watch?v=73N43h8R670',
                'description' => 'A reflection on how love should guide our thoughts, actions, and relationships.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Trusting God’s Plan',
                'youtube_link' => 'https://www.youtube.com/watch?v=H0xmQmskXPg',
                'description' => 'Encouragement to trust God’s plan even when the path ahead seems unclear.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'The Gift of Salvation',
                'youtube_link' => 'https://www.youtube.com/watch?v=H6kaKSk9hIg',
                'description' => 'Celebrating the ultimate gift of salvation through Christ’s sacrifice on the cross.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Serving Others',
                'youtube_link' => 'https://www.youtube.com/watch?v=q8p_fFbdWYQ',
                'description' => 'Discovering the joy and humility of serving others as Christ served us.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Living by Faith',
                'youtube_link' => 'https://www.youtube.com/watch?v=kQjhVNgESz8',
                'description' => 'Learning to walk daily by faith, not by sight, relying fully on God’s guidance.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'God’s Unfailing Love',
                'youtube_link' => 'https://www.youtube.com/watch?v=yVO3XUE3d1k',
                'description' => 'A sermon reminding us of the constant, unchanging love of God for His people.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
