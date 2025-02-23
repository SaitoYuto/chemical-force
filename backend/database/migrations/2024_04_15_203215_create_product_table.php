<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->string('id', 6)->nullable(false)->primary();
            $table->string('name', 30)->nullable(false);
            $table->string('description', 90)->nullable(false);
            $table->unsignedMediumInteger('price')->nullable(false);
            $table->unsignedSmallInteger('volume')->nullable(false);
            $table->string('unit', 6)->nullable(false);
            $table->string('sales_rep_id', 6)->nullable();

            $table->foreign('sales_rep_id')->references('id')->on('users')->cascadeOnDelete();
        });
        DB::statement("ALTER TABLE products ADD CONSTRAINT chk_prod_id CHECK (id REGEXP '^P[0-9]+$');");
        DB::statement("ALTER TABLE products ADD CONSTRAINT chk_price CHECK (price > 0);");
        DB::statement("ALTER TABLE products ADD CONSTRAINT chk_volume CHECK (volume > 0);");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
