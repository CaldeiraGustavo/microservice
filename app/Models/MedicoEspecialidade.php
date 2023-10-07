<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicoEspecialidade extends Model
{
    protected $table = 'medico_especialidade';
    public $timestamps = false;

    protected $fillable = [
        'fk_medico_id',
        'fk_especialidade_id',
    ];

    public function medico()
    {
        return $this->belongsTo(Medico::class, 'fk_medico_id', 'id');
    }

    public function especialidade()
    {
        return $this->belongsTo(Especialidade::class, 'fk_especialidade_id', 'id');
    }
}
