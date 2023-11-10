<?php

namespace Database\Seeders;

use App\Models\Masters\MediaSize;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MediaSizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Billboard', 'size' => '970*250', 'media_type' => 'image'],
            ['name' => 'Smartphone Banner', 'size' => '300*50', 'media_type' => 'image'],
            ['name' => 'Smartphone Banner', 'size' => '320*50', 'media_type' => 'image'],
            ['name' => 'Leaderboard', 'size' => '728*90', 'media_type' => 'image'],
            ['name' => 'Super Leaderboard/Pushdown', 'size' => '970*90', 'media_type' => 'image'],
            ['name' => 'Portrait', 'size' => '300*1050', 'media_type' => 'image'],
            ['name' => 'Skyscraper', 'size' => '160*600', 'media_type' => 'image'],
            ['name' => 'Medium Rectangle', 'size' => '300*250', 'media_type' => 'image'],
            ['name' => 'Mobilephone Interstitial', 'size' => '640*1136|750*1334|1080*1920', 'media_type' => 'image'],
            ['name' => 'Featurephone Small Banner', 'size' => '120*20', 'media_type' => 'image'],
            ['name' => 'Featurephone Small Banner', 'size' => '168*28', 'media_type' => 'image'],
        ];

        MediaSize::insert($data, ['name', 'size', 'media_type']);
    }
}
