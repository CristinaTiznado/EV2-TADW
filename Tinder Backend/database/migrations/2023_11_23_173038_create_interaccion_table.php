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
        Schema::create('interaccion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('perro_id');
            $table->unsignedBigInteger('perro_candidato_id');
            $table->char('preferencia', 1);
            $table->timestamps();

            // Claves foráneas
            $table->foreign('perro_id')->references('id')->on('perros');
            $table->foreign('perro_candidato_id')->references('id')->on('perros');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interaccion');
    }
};
