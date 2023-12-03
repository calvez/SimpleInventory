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
            'transactions',
            function (Blueprint $table) {
                $table->id();
                $table->string('name', 100)->nullable()->default(null);
                $table->date('date_of_trans')->default(now());
                $table->string('reference')->nullable()->default(null);
                $table->string('type')->default('Kiadás');
                $table->text('note')->nullable();
                $table->foreignId('storage_id')->nullable()->constrained();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
