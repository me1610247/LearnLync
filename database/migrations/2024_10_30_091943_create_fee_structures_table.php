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
        Schema::create('fee_structures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained()->onDelete('cascade');
            $table->foreignId('academic_year_id')->constrained()->onDelete('cascade');
            $table->foreignId('fee_head_id')->constrained()->onDelete('cascade');
            
            // Month columns with _fee suffix
            $table->string('january_fee')->nullable();
            $table->string('february_fee')->nullable();
            $table->string('march_fee')->nullable();
            $table->string('april_fee')->nullable();
            $table->string('may_fee')->nullable();
            $table->string('june_fee')->nullable();
            $table->string('july_fee')->nullable();
            $table->string('august_fee')->nullable();
            $table->string('september_fee')->nullable();
            $table->string('october_fee')->nullable();
            $table->string('november_fee')->nullable();
            $table->string('december_fee')->nullable();
    
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_structures');
    }
};
