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
        Schema::create('areas', function (Blueprint $table) {
            $table->string('id', 6)->nullable(false)->primary();
            $table->string('name', 20)->nullable(false);
            $table->string('depot', 15)->nullable(false);
            $table->unsignedBigInteger('sales_target')->nullable(false);
            $table->string('manager_id', 6)->nullable();

            $table->foreign('manager_id')->references('id')->on('users')->cascadeOnDelete();
        });
        DB::statement("ALTER TABLE areas ADD CONSTRAINT chk_area_id CHECK (id REGEXP '^A[0-9]+$');");
        DB::statement("ALTER TABLE areas ADD CONSTRAINT chk_sales_target CHECK (sales_target > 0);");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area');
    }
};
