<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comidas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('item_id'); // ID del ítem en la API
            $table->integer('tier'); // Tier de la comida (T4, T5, T6, etc)
            $table->integer('nivel'); // Nivel de enchant (1, 2, 3, 4...)
            $table->decimal('precio', 10, 2)->nullable(); // Precio actual
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comidas');
    }
};
