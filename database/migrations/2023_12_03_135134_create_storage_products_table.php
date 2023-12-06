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
                $table->unsignedBiginteger('storage_id')->nullable();
                $table->unsignedBiginteger('product_id')->nullable();
                $table->integer('quantity');
                $table->integer('min_quantity');
                $table->integer('max_quantity');
                $table->integer('reorder_quantity');
                $table->integer('reorder_days');
                $table->timestamps();

                $table->foreign('storage_id')->references('id')
                    ->on('storages')->onDelete('cascade');

                $table->foreign('product_id')->references('id')
                    ->on('products')->onDelete('cascade');
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
