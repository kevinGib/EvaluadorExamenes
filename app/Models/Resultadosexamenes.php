<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultadosexamenes extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $primaryKey='id';
    protected $fillable=[
        'idExamen',
        'examen',
        'idDocente',
        'idAlumno',
        'nombreAlumno',
        'intentos',
        'promedio',
    ];
}
