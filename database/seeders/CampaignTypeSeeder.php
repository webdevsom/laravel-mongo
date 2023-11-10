<?php

namespace Database\Seeders;

use App\Models\Masters\CampaignType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampaignTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'CPM'],
            ['name' => 'CPC'],
            ['name' => 'CPA'],
        ];

        CampaignType::insert($data, 'name');
    }
}
