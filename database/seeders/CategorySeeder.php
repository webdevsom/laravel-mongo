<?php

namespace Database\Seeders;

use App\Models\Masters\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Books & Literature'],
            ['name' => 'Celebrity Fab/Gossip'],
        ];

        Category::insert($data, 'name');
    }
}
