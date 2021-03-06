<?php

namespace App\Models;

use App\Models\Salario;
use App\Models\Candidato;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;

    protected $table = 'vacantes';

    protected $dates = ['ultimo_dia'];

    protected $fillable  = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'publicado',
        'user_id',
    ];

    //Relacion entre vacante y categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    //Relacion entre vacante y salario
    public function salario()
    {
        return $this->belongsTo(Salario::class);
    }

    //Relacion entre vacante y candidatos
    public function candidatos()
    {
        return $this->hasMany(Candidato::class)->orderBy('created_at', 'desc');
    }

    //Relacion entre vacante y reclutador
    public function reclutador()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
