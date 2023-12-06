<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * 'name',
     * 'sku',
     * 'manufacturer_sku',
     * 'unit',
     * 'description',
     * 'message',
     * 'net_amount',
     * 'gross_amount',
     * 'product_category_id',
     * 'tax_id',
     * 'min_store',
     * 'barcode',
     * 'vtsz',
     */
    public function up(): void
    {
        Schema::create(
            'products',
            function (Blueprint $table) {
                $table->id();
                $table->string('sku', 100)->nullable()->default('sku');
                $table->string('manufacturer_sku', 100)->nullable()->default('manufacturer_sku');
                $table->string('name', 100)->nullable()->default(null);
                $table->text('description')->nullable()->default(null);
                $table->text('message')->nullable()->default(null);
                $table->string('unit', 100)->nullable()->default('db');
                $table->float('net_amount')->nullable()->default(123.45);
                $table->float('gross_amount')->nullable()->default(123.45);
                $table->unsignedBiginteger('product_category_id')->nullable()->default(null);
                $table->unsignedBiginteger('tax_id')->nullable()->default(null);
                $table->integer('min_store')->unsigned()->nullable()->default(0);
                $table->string('barcode', 100)->nullable()->default('12345678912345')->unique();
                $table->string('barcode_img', 255)->nullable()->default(null)->unique();
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
