<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        Product::create([

            'category_id'=>1,

            'name'=>'Premium Green Tea',

            'slug'=>'premium-green-tea',

            'sku'=>'PVT001',

            'price'=>299,

            'sale_price'=>249,

            'stock'=>100,

            'featured'=>1,

            'best_seller'=>1,

            'status'=>1

        ]);
    }
}