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
        Schema::create('sales_reps', function (Blueprint $table) {
            $table->string('id', 6)->nullable();
            $table->char('grade', 1)->nullable(false);
            $table->unsignedBigInteger('salary')->nullable(false);
            $table->string('supervisor_id', 6)->nullable();

            $table->foreign('id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('supervisor_id')->references('id')->on('sales_reps')->cascadeOnDelete();
        });

        DB::statement("ALTER TABLE sales_reps ADD CONSTRAINT chk_grade CHECK (grade IN ('1', '2', '3', '4', '5'));");
        DB::statement("ALTER TABLE sales_reps ADD CONSTRAINT chk_salary CHECK (salary > 0);");
        DB::statement(
            "ALTER TABLE sales_reps ADD CONSTRAINT check_salary_range_by_grade CHECK 
        (
            (
            grade = '1' AND salary BETWEEN 10000 AND 15000
            )
            OR (
            grade = '2' AND salary BETWEEN 15001 AND 20000
            )
            OR (
            grade = '3' AND salary BETWEEN 20001 AND 25000
            )
            OR (
            grade = '4' AND salary BETWEEN 25001 AND 30000
            )
            OR (
            grade = '5' AND salary BETWEEN 30001 AND 35000
            )
        );"
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_reps');
    }
};
