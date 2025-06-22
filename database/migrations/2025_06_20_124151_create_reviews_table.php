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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');
            $table->enum('review_type' , ['تجربة عامة' , 'مقتني سابق' ,'تجربة قيادة' ]);
            $table->decimal('fuel_consumption');
            $table->decimal('acceleration');
            $table->decimal('interior_space');
            $table->decimal('exterior_design');
            $table->decimal('features');
            $table->decimal('estimated_price');
            $table->enum('status' , ['pending' , 'approved' , 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
