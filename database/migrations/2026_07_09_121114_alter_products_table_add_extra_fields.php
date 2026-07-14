<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            if (!Schema::hasColumn('products', 'weight')) {
                $table->string('weight')->nullable()->after('stock');
            }

            if (!Schema::hasColumn('products', 'stock_status')) {
                $table->string('stock_status')->default('In Stock')->after('weight');
            }

            if (!Schema::hasColumn('products', 'tags')) {
                $table->text('tags')->nullable()->after('description');
            }

        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropColumn([
                'weight',
                'stock_status',
                'tags'
            ]);

        });
    }
};