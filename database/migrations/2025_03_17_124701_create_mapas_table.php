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
        Schema::create('mapas', function (Blueprint $table) {
            $table->id();
            $table->string('ciudad');
            $table->decimal('precio_83', 10, 2)->nullable();
            $table->decimal('precio_84', 10, 2)->nullable();
            $table->decimal('precio_bulk', 10, 2)->nullable();
            $table->integer('cantidad_bulk')->nullable();
            $table->decimal('total_inversion', 10, 2)->nullable();
            $table->decimal('profit', 10, 2)->nullable();
            $table->decimal('profit_ciudad_cara', 10, 2)->nullable();
            $table->decimal('profit_x_bulk', 10, 2)->nullable();
            $table->decimal('profit_x_bulk_ciudad_cara', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapas');
    }
};
