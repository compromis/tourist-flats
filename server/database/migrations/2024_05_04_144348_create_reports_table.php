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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('coordinates');
            $table->enum('type', ['tourist_flat', 'illegal_works']);
            $table->string('email');
            $table->string('address_street');
            $table->string('address_number')->nullable();
            $table->string('address_box')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('picture')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
