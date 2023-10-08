<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /**
     * @OA\Schema(
     *     schema="Usuario",
     *     type="object",
     *     title="Usuário",
     *     @OA\Property(property="usuario", type="string"),
     *     @OA\Property(property="senha", type="string"),
     *     @OA\Property(property="tipo", type="string"),
     * )
     */

    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuario';


    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'usuario',
        'senha',
        'tipo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
