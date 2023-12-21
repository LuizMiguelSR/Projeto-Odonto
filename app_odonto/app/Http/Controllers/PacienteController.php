<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;

class PacienteController extends Controller
{
    public function __construct(Paciente $paciente)
    {
        $this->middleware('auth');
        $this->paciente = $paciente;
    }

    public function inicio()
    {
        $paginator = Paciente::paginate(8);
        $pacientes = $paginator;
        return view('admin.paciente_inicio', compact('pacientes', 'paginator'));
    }

    public function cadastrar()
    {
        return view('admin.paciente_cadastrar');
    }

    public function armazenar(Request $request)
    {

        $request->validate($this->paciente->rules(), $this->paciente->feedback());

        $paciente = new Paciente($request->all());
        $paciente->save();
        return redirect()->route('paciente.inicio')->with('sucess', 'Paciente cadastrado com sucesso');
    }

    public function excluir($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();
        return redirect()->route('paciente.inicio')->with('sucess', 'Paciente removido com sucesso');
    }

    public function editar($id)
    {
        $paciente = Paciente::find($id);
        return view('admin.paciente_editar', compact('paciente'));
    }

    public function atualizar(Request $request, $id)
    {

        $paciente = Paciente::find($id);

        $request->validate($paciente->rules(), $paciente->feedback());

        $paciente->update($request->all());
        return redirect()->route('paciente.inicio')->with('sucess', 'Paciente editado com sucesso');
    }

    public function filtrar(Request $request)
    {
        $nome = $request->query('nome');
        $email = $request->query('email');
        $telefone = $request->query('telefone');

        $query = Paciente::query()
            ->when($nome, fn ($query) => $query->where('nome', 'like', '%' . $nome . '%'))
            ->when($email, fn ($query) => $query->where('email', 'like', '%' . $email . '%'))
            ->when($telefone, fn ($query) => $query->where('telefone', 'like', '%' . $telefone));

        $paginator = $query->paginate(8);
        $pacientes = $paginator;

        return view('admin.paciente_inicio', compact('pacientes', 'paginator'));
    }
}
