<?php

/* database/migrations/2025_06_20_160320_create_rooms_table.php */

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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('location_id')->constrained();
            $table->string('name');
            $table->integer('capacity_min');
            $table->integer('capacity_max');
            $table->decimal('price_per_hour', 8, 2);
            $table->string('type');
            $table->string('image_url');
            $table->json('features');
            $table->text('description');
            $table->decimal('rating', 3, 1);
            $table->integer('reviews');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
