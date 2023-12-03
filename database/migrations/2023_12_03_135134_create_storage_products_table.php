<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'storage_products',
            function (Blueprint $table) {
                $table->id();
                $table->foreignId('storage_id')->constrained();
                $table->foreignId('product_id')->constrained();
                $table->integer('quantity');
                $table->integer('min_quantity');
                $table->integer('max_quantity');
                $table->integer('reorder_quantity');
                $table->integer('reorder_days');
                $table->integer('reorder_level');
                $table->integer('reorder_level_days');
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storage_products');
    }
};
