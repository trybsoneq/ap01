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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->foreignId('car_class_id')->constrained('car_classes')->onDelete('cascade');

            $table->string('brand');
            $table->string('model');
            $table->string('registration_number')->unique();
            $table->integer('production_year');
            $table->decimal('price_per_day', 8, 2);
            $table->boolean('is_available')->default(true);
            
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
