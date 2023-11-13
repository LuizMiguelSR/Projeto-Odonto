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
            $paginator = Prontuario::paginate(8);
            $prontuarios = $paginator;
            return view('admin.prontuario_inicio', compact('prontuarios', 'paginator'));
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
            'pdf_file' => 'required|mimes:pdf|max:5120',
        ]);

        $pdfFile = $request->file('pdf_file');
        $fileName = 'pdf_' . uniqid() . '.' . $pdfFile->getClientOriginalExtension();
        $filePath = $pdfFile->storeAs('pdfs', $fileName, 'public');
        Prontuario::create([
            'paciente_id' => $request->id,
            'caminho_arquivo' => $filePath,
        ]);

        return redirect()->route('prontuario.inicio')->with('sucess', 'Prontuário enviado com sucesso!');
    }
}
