<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    protected $table = 'especialidade';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'categoria',
    ];

    public function medicos()
    {
        return $this->belongsToMany(Medico::class, 'medico_especialidade', 'fk_especialidade_id', 'fk_medico_id');
    }
}
