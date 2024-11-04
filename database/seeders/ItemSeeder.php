<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['name' => 'Nasi Goreng', 'price' => 20000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mie Ayam', 'price' => 15000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sate Ayam', 'price' => 25000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ayam Goreng', 'price' => 30000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gado-Gado', 'price' => 18000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Soto Ayam', 'price' => 22000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bakso', 'price' => 20000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Rendang', 'price' => 40000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ikan Bakar', 'price' => 35000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Es Teh', 'price' => 5000, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Es Jeruk', 'price' => 7000, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('items')->insert($items);
    }
}
