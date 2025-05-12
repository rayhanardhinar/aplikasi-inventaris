<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "name" => "Kulkas",
            "description" => "Philips 2 Pintu",
            "quantity" => 100,
            "price" => 3000000,
            "category_id" => 1,
        ]);
    }
}
