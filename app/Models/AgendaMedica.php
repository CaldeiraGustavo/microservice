<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaMedica extends Model
{
    protected $table = 'agenda_medica';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'data',
        'hora',
        'observacoes',
        'cpf_paciente',
        'tipo_consulta',
        'fk_medico_id',
    ];


    public function medico()
    {
        return $this->belongsTo(Medico::class, 'fk_medico_id', 'id');
    }
}
