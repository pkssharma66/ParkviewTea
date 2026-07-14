<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('admins', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->string('email')->unique();

            $table->string('password');

            $table->string('mobile')->nullable();

            $table->string('photo')->nullable();

            $table->tinyInteger('role')->default(1);
            //1=Super Admin
            //2=Manager
            //3=Staff

            $table->boolean('status')->default(true);

            $table->rememberToken();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};