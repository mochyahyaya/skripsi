<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel_monitorings', function (Blueprint $table) {
            $table->id();
            $table->enum('food', ['Normal', 'Tidak Normal']);
            $table->enum('temperature', ['Normal', 'Tidak Normal']);
            $table->enum('medicine', ['Sudah', 'Tidak Butuh']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_monitorings');
    }
};
