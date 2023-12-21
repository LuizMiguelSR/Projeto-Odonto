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

    public function rules()
    {
        return [
            'pdf_file' => 'required|mimes:pdf|max:5120',
        ];
    }

    public function feedback()
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido.',
            'pdf_file.mimes' => 'O arquivo deve ser no formato PDF.',
            'pdf_file.max' => 'O arquivo deve ter no máximo 5MB.',
        ];
    }

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'paciente_id');
    }
}
