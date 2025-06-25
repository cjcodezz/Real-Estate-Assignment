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
        // database/migrations/xxxx_create_properties_table.php
Schema::create('properties', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->enum('type', ['Flat', 'Villa', 'Plot']);
    $table->decimal('price', 10, 2);
    $table->integer('area_sqft');
    $table->string('address');
    $table->text('description');
    $table->string('image_path');
    $table->timestamps();
});


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
