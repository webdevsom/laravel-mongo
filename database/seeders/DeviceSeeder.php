<?php

namespace Database\Seeders;

use App\Models\Masters\Device;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Mobile', 'type' => 'Device'],
            ['name' => 'Desktop', 'type' => 'Device'],
            ['name' => 'Tablet', 'type' => 'Device'],
            ['name' => 'Chrome', 'type' => 'Browser'],
            ['name' => 'Firefox', 'type' => 'Browser'],
            ['name' => 'Safari', 'type' => 'Browser'],
            ['name' => 'Others', 'type' => 'Browser'],
        ];

        Device::insert($data, ['name', 'type']);
    }
}
