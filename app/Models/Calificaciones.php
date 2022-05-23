<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    use HasFactory;
    use HasFactory;
    public $timestamps=false;
    protected $primaryKey='id';
    protected $fillable=[
        'idResultado',
        'idExamen',
        'Examen',
        'idDocente',
        'idAlumno',
        'calificacion',
    ];



   


}
