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
        Schema::create('resultadosexamenes', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('idExamen');
            $table->integer('idExamen');
            $table->string('Examen');
            $table->unsignedBigInteger('idDocente');
            $table->unsignedBigInteger('idAlumno');
            $table->string('nombreAlumno');
            $table->integer('intentos');
            $table->integer('promedio');
            // $table->foreign('idExamen')->references('idExamen')->on('examenes')->onDelete('cascade');
            $table->foreign('idDocente')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idAlumno')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultadosexamenes');
    }
};
