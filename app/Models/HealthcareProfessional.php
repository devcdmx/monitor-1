<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HealthcareProfessional extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nombre_completo',
        'matricula',
        'localidad',
        'des_localidad',
        'delegacion',
        'tc',
        'des_tc',
        'clave_puesto',
        'des_puesto',
        'clave_depto',
        'des_depto',
        'clave_adscri',
        'clave_turno',
        'des_turno',
        'sexo',
        'rfc',
        'curp',
        'ant_anios',
        'ant_qnas',
        'ant_dias',
        'fecha_ingreso',
        'status',
        'especialidad',
    ];
}