<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paciente;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'paciente_id',
        'data_consulta',
        'descricao',
        'status',
    ];

    public function rules()
    {
        return [
            'data_consulta' => 'required',
            'descricao' => 'required',
        ];
    }

    public function feedback()
    {
        return [
            'required' => 'O campo :attribute é requerido.',
        ];
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
