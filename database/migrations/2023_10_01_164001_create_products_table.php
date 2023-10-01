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
            'products',
            function (Blueprint $table) {
                $table->id();
                $table->string('sku', 100)->nullable()->default('text');
                $table->string('name', 100)->nullable()->default(null);
                $table->text('description')->nullable()->default(null);
                $table->text('message')->nullable()->default(null);
                $table->string('unit', 100)->nullable()->default('db');
                $table->float('net_amount')->nullable()->default(123.45);
                $table->float('gross_amount')->nullable()->default(123.45);
                $table->unsignedBiginteger('product_category_id')->nullable()->default(null);
                $table->unsignedBiginteger('tax_id')->nullable()->default(null);
                $table->integer('min_store')->unsigned()->nullable()->default(1);
                $table->string('barecode', 100)->nullable()->default('text');
                $table->string('vtsz', 100)->nullable()->default('text');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('product_category_id')->references('id')
                    ->on('product_categories')->onDelete('cascade');

                $table->foreign('tax_id')->references('id')
                    ->on('tax_groups')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
