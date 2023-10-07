<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'cpf',
        'rg',
        'data_nascimento',
        'estado_civil',
        'fk_prontuario_id',
        'fk_usuario_id',
    ];

}
