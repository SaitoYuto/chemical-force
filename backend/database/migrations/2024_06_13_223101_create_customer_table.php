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
        Schema::create('customers', function (Blueprint $table) {
            $table->string('id', 6)->nullable(false)->primary();
            $table->string('honorific', 6)->nullable(false);
            $table->string('first_name', 20)->nullable(false);
            $table->string('last_name', 20)->nullable(false);
            $table->string('house_number', 16)->nullable(false);
            $table->string('street', 20)->nullable(false);
            $table->string('account', 8)->nullable(false);
            $table->string('sales_rep_id', 6)->nullable();

            $table->foreign('sales_rep_id')->references('id')->on('users')->cascadeOnDelete();
        });
        DB::statement("ALTER TABLE customers ADD CONSTRAINT chk_id CHECK (id REGEXP '^C[0-9]+$');");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
