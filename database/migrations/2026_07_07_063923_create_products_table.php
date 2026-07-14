<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {

            $table->id();

            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('name');

            $table->string('slug')->unique();

            $table->string('sku')->unique();

            $table->decimal('price',10,2);

            $table->decimal('sale_price',10,2)->nullable();

            $table->integer('stock')->default(0);

            $table->string('thumbnail')->nullable();

            $table->text('short_description')->nullable();

            $table->longText('description')->nullable();

            $table->float('weight')->nullable();

            $table->boolean('featured')->default(false);

            $table->boolean('best_seller')->default(false);

            $table->boolean('status')->default(true);

            $table->string('meta_title')->nullable();

            $table->text('meta_description')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};