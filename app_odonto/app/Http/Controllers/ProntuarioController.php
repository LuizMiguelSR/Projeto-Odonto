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

    public function filtrar(Request $request)
    {
        $nome = $request->query('nome');
        $dataInicio = $request->query('data_inicio');
        $dataFim = $request->query('data_fim');

        $query = Prontuario::query()
            ->when($nome, function ($query) use ($nome) {
                $query->whereHas('paciente', function ($subQuery) use ($nome) {
                    $subQuery->where('nome', 'like', '%' . $nome . '%');
                });
            })
            ->when($dataInicio, function ($query) use ($dataInicio, $dataFim) {
                $dataInicio = date('Y-m-d H:i:s', strtotime($dataInicio));
                $query->where('created_at', '>=', $dataInicio);
            })
            ->when($dataFim, function ($query) use ($dataInicio, $dataFim) {
                $dataFim = date('Y-m-d H:i:s', strtotime($dataFim . ' 23:59:59'));
                $query->where('created_at', '<=', $dataFim);
            });

        $paginator = $query->paginate(8);
        $prontuarios = $paginator;

        return view('admin.prontuario_inicio', compact('prontuarios', 'paginator'));
    }
}
