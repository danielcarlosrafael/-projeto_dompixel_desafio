<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Produto 1',
            'description' => 'Descrição do Produto 1',
            'price' => 19.99,
            'quantity' => 100,
        ]);

        Product::create([
            'name' => 'Produto 2',
            'description' => 'Descrição do Produto 2',
            'price' => 29.99,
            'quantity' => 50,
        ]);
    }
}
