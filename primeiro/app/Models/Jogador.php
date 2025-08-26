<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    protected $guarded = [];
    protected $table = 'jogadores';

    protected $fillable = [
        'nome',
        'clube', 
        'nacionalidade',
        'sobre',
        'numero_de_titulos'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
