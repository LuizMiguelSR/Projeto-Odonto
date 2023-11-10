<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prontuario;
use App\Models\Paciente;

class ProntuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio()
    {
        try {
            $prontuarios = Prontuario::all();
            return view('admin.prontuario_inicio', compact('prontuarios'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function cadastrar()
    {
        $pacientes = Paciente::all();
        return view('admin.prontuario_cadastrar', compact('pacientes'));
    }

    public function armazenar(Request $request)
    {

        $request->validate([
            'pdf_file' => 'required|mimes:pdf|max:5120', // Verifica se é um arquivo PDF e tamanho máximo de 2MB
        ]);

        $pdfFile = $request->file('pdf_file');
        $fileName = 'pdf_' . uniqid() . '.' . $pdfFile->getClientOriginalExtension();
        $filePath = $pdfFile->storeAs('pdfs', $fileName, 'public'); // Salva o arquivo na pasta 'storage/app/public/pdfs'
        // Salva o caminho do arquivo no banco de dados
        Prontuario::create([
            'paciente_id' => $request->id,
            'caminho_arquivo' => $filePath,
        ]);

        return redirect()->route('prontuario.inicio')->with('sucess', 'Prontuário enviado com sucesso!');
    }
}
