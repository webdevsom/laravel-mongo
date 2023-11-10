<?php

namespace Database\Seeders;

use App\Models\Masters\Frequency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Daily'],
            ['name' => 'Weekly'],
            ['name' => 'Monthly'],
        ];

        Frequency::insert($data, ['name']);
    }
}
