<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class Prontuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'caminho_arquivo',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
