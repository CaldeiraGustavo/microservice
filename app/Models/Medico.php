<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;
    protected $table = 'medico';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'uf',
        'municipio',
        'crm',
        'fk_usuario_id',
    ];

    public function especialidades()
    {
        return $this->belongsToMany(
            Especialidade::class,
            'medico_especialidade',
            'fk_medico_id',
            'fk_especialidade_id'
        );
    }

    public function agendaMedica()
    {
        return $this->hasMany(AgendaMedica::class, 'fk_medico_id', 'id');
    }
}
