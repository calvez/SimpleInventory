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
            'partners',
            function (Blueprint $table) {
                $table->id();
                $table->string('name', 100)->nullable()->default(null);
                $table->text('description')->nullable()->default(null);
                $table->text('message')->nullable()->default(null);
                $table->unsignedBiginteger('partner_category')->nullable();
                $table->string('bank_account', 32)->nullable()->default('text');
                $table->string('vat_number', 100)->nullable()->default(null);
                $table->string('eu_vat_number', 100)->nullable()->default(null);
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('partner_category')->references('id')
                    ->on('partner_categories')->onDelete('cascade');
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
