<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consulta';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'data_hora',
        'unidade_atendimento',
        'tipo',
        'observacoes',
        'fk_medico_id',
        'fk_paciente_id',
    ];


    public function medico()
    {
        return $this->belongsTo(Medico::class, 'fk_medico_id', 'id');
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'fk_paciente_id', 'id');
    }
}
