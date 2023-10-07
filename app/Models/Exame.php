<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    protected $table = 'exames';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'cod_exame',
        'nome_exame',
        'metodo_realizacao',
        'indicacao',
        'parte_corpo',
    ];

    public function prontuario()
    {
        return $this->belongsTo(Prontuario::class, 'fk_exames_id', 'id');
    }
}
