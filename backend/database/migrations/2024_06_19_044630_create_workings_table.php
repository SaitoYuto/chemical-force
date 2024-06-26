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
        Schema::create('workings', function (Blueprint $table) {
            $table->string('sales_rep_id', 6)->nullable();
            $table->string('area_id', 6)->nullable();

            $table->foreign('sales_rep_id')->references('id')->on('sales_reps')->cascadeOnDelete();
            $table->foreign('area_id')->references('id')->on('areas')->cascadeOnDelete();
            $table->unique(['sales_rep_id', 'area_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workings');
    }
};
