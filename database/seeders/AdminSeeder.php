<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {

        Admin::create([

            'name'=>'Super Admin',

            'email'=>'admin@parkviewtea.com',

            'password'=>Hash::make('Admin@123'),

            'role'=>1,

            'status'=>1

        ]);

    }
}