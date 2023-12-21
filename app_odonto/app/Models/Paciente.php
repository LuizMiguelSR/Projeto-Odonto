<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Prontuario;
use App\Models\Consulta;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'cpf',
    ];

    public function rules()
    {
        return [
            'nome' => 'required|min:4|max:40',
            'email' => 'required|unique:pacientes,email,'.$this->id,
            'cpf' => 'required|unique:pacientes,cpf,'.$this->id.'|regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/',
            'telefone' => 'required|regex:/^\(\d{2}\)\d{5}-\d{4}$/',
        ];
    }

    public function feedback()
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido.',
            'nome.min' => 'O campo deve ter no mínimo 4 caracteres.',
            'nome.max' => 'O campo deve ter no máximo 40 caracteres.',
            'email.unique' => 'Este email já está em uso. Por favor, escolha outro.',
            'cpf.unique' => 'Este cpf já está em uso. Por favor, escolha outro.',
            'telefone.regex' => 'O telefone deve estar no formato (XX)XXXXX-XXXX.',
            'cpf.regex' => 'O CPF deve estar no formato XXX.XXX.XXX-XX.',
        ];
    }

    public function prontuarios()
    {
        return $this->hasMany(Prontuario::class, 'paciente_id');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'paciente_id');
    }
}
