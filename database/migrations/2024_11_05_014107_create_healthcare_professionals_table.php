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
        Schema::create('healthcare_professionals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nombre_completo')->required();
            $table->integer('matricula')->required();
            $table->string('localidad')->nullable();
            $table->string('des_localidad')->nullable();
            $table->string('delegacion')->nullable();
            $table->integer('tc')->nullable();
            $table->string('des_tc')->nullable();
            $table->string('clave_puesto')->nullable();
            $table->string('des_puesto')->nullable();
            $table->string('clave_depto')->nullable();
            $table->string('des_depto')->nullable();
            $table->string('clave_adscri')->nullable();
            $table->integer('clave_turno')->nullable();
            $table->string('des_turno')->nullable();
            $table->string('sexo')->required();
            $table->string('rfc')->nullable();
            $table->string('curp')->nullable();
            $table->string('ant_anios')->nullable();
            $table->string('ant_qnas')->nullable();
            $table->string('ant_dias')->nullable();
            $table->date('fecha_ingreso');
            $table->string('status')->nullable();
            $table->string('especialidad')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('healthcare_professionals');
    }
};
