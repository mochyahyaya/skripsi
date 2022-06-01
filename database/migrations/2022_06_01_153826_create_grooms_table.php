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
        Schema::create('grooms', function (Blueprint $table) {
            $table->id();
            $table->string('price');
            $table->enum('service', ['Lengkap', 'Jamur', 'Kutu']);
            $table->enum('status', ['Belum diproses', 'Diproses', 'Selesai']);
            $table->enum('pickup', ['Ya', 'Tidak']);
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
        Schema::dropIfExists('grooms');
    }
};
