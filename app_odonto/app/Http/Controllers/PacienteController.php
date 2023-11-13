<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio()
    {
        try {
            $paginator = Paciente::paginate(8);
            $pacientes = $paginator;
            return view('admin.paciente_inicio', compact('pacientes', 'paginator'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function cadastrar()
    {
        return view('admin.paciente_cadastrar');
    }

    public function armazenar(Request $request)
    {
        $regras = [
            'nome' => 'required|min:4|max:40',
            'email' => 'required|unique:pacientes',
            'cpf' => 'required|unique:pacientes|regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/',
            'telefone' => 'required|regex:/^\(\d{2}\)\d{5}-\d{4}$/',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'nome.min' => 'O campo deve ter no mínimo 4 caracteres.',
            'nome.max' => 'O campo deve ter no máximo 40 caracteres.',
            'email.unique' => 'Este email já está em uso. Por favor, escolha outro.',
            'cpf.unique' => 'Este cpf já está em uso. Por favor, escolha outro.',
            'telefone.regex' => 'O telefone deve estar no formato (XX)XXXXX-XXXX.',
            'cpf.regex' => 'O CPF deve estar no formato XXX.XXX.XXX-XX.',
        ];

        $request->validate($regras, $feedback);

        try {
            $paciente = new Paciente($request->all());
            $paciente->save();
            return redirect()->route('paciente.inicio')->with('sucess', 'Paciente cadastrado com sucesso');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function excluir($id)
    {
        try {
            $paciente = Paciente::find($id);
            $paciente->delete();
            return redirect()->route('paciente.inicio')->with('sucess', 'Paciente removido com sucesso');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function editar($id)
    {
        try {
            $paciente = Paciente::find($id);
            return view('admin.paciente_editar', compact('paciente'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function atualizar(Request $request, $id)
    {

        $paciente = Paciente::find($id);

        $regras = [
            'nome' => 'required|min:4|max:40',
            'email' => 'unique:pacientes',
            'telefone' => 'required|regex:/^\(\d{2}\)\d{5}-\d{4}$/',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'nome.min' => 'O campo deve ter no mínimo 4 caracteres.',
            'nome.max' => 'O campo deve ter no máximo 40 caracteres.',
            'email.unique' => 'Este email já está em uso. Por favor, escolha outro.',
            'telefone.regex' => 'O telefone deve estar no formato (XX)XXXXX-XXXX.',
        ];

        $request->validate($regras, $feedback);

        $dadosPaciente = [
            'nome' => $request->input('nome'),
            'telefone' => $request->input('telefone'),
        ];

        if ($request->filled('email')) {
            $dadosPaciente['email'] = $request->input('email');
        }

        try {
            $paciente->update($dadosPaciente);
            return redirect()->route('paciente.inicio')->with('sucess', 'Paciente editado com sucesso');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
