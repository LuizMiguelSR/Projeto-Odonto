<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prontuario;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cpf',
    ];

    public function prontuarios()
    {
        return $this->hasMany(Prontuario::class, 'paciente_id');
    }
}
