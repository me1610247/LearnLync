<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreditHoursAndInstructorToSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->integer('credit_hours')->nullable();
            $table->string('instructor')->nullable(); // or $table->foreignId('instructor_id')->constrained()->onDelete('cascade'); if you have an instructors table
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropColumn(['credit_hours', 'instructor']);
        });
    }
}
