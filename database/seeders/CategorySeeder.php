<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([

            [
                'name'=>'Green Tea',
                'slug'=>'green-tea',
                'status'=>1
            ],

            [
                'name'=>'Black Tea',
                'slug'=>'black-tea',
                'status'=>1
            ],

            [
                'name'=>'Masala Tea',
                'slug'=>'masala-tea',
                'status'=>1
            ]

        ]);
    }
}