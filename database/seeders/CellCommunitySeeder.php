<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CellCommunity;

class CellCommunitySeeder extends Seeder
{
    public function run(): void
    {
        $communities = [
            [
                'name' => 'KRISPEN ALPHA',
                'type' => 'Krispen',
                'facilitator_name' => 'John Doe',
                'contact_info' => '+62 812-3456-7890',
                'meeting_schedule' => 'Senin, 19:00 WIB'
            ],
            [
                'name' => 'KRISPEN BETA',
                'type' => 'Krispen',
                'facilitator_name' => 'Jane Smith',
                'contact_info' => '+62 813-4567-8901',
                'meeting_schedule' => 'Rabu, 19:30 WIB'
            ],
            [
                'name' => 'BYC GAMMA',
                'type' => 'BYC',
                'facilitator_name' => 'Michael Johnson',
                'contact_info' => '+62 814-5678-9012',
                'meeting_schedule' => 'Jumat, 19:00 WIB'
            ],
            [
                'name' => 'DLC DELTA',
                'type' => 'DLC',
                'facilitator_name' => 'Sarah Wilson',
                'contact_info' => '+62 815-6789-0123',
                'meeting_schedule' => 'Sabtu, 16:00 WIB'
            ],
            [
                'name' => 'KRISPEN EPSILON',
                'type' => 'Krispen',
                'facilitator_name' => 'David Brown',
                'contact_info' => '+62 816-7890-1234',
                'meeting_schedule' => 'Minggu, 14:00 WIB'
            ],
            [
                'name' => 'BYC ZETA',
                'type' => 'BYC',
                'facilitator_name' => 'Lisa Davis',
                'contact_info' => '+62 817-8901-2345',
                'meeting_schedule' => 'Selasa, 19:00 WIB'
            ]
        ];

        foreach ($communities as $community) {
            CellCommunity::create($community);
        }
    }
}