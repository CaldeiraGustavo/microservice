<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    /**
     * @OA\Schema(
     *     schema="Consulta",
     *     type="object",
     *     title="Consulta",
     *     @OA\Property(property="data_hora", type="string", format="date-time"),
     *     @OA\Property(property="unidade_atendimento", type="integer", format="int64"),
     *     @OA\Property(property="tipo", type="string"),
     *     @OA\Property(property="observacoes", type="string"),
     *     @OA\Property(property="fk_medico_id", type="integer", format="int64"),
     *     @OA\Property(property="fk_paciente_id", type="integer", format="int64"),
     * )
     */

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
