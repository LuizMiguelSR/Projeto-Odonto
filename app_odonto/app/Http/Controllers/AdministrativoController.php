<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AdministrativoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        try {
            $usuarios = User::all();
            return view('admin.dashboard', compact('usuarios'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function cadastrar()
    {
        return view('admin.cadastro');
    }

    public function armazenar(Request $request)
    {

        $regras = [
            'name' => 'required|min:4|max:40',
            'email' => 'required|unique:users',
            'role' => 'required|in:admin,user',
            'password' => 'required|min:4|confirmed',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido.',
            'name.min' => 'O campo deve ter no mínimo 4 caracteres.',
            'name.max' => 'O campo deve ter no máximo 40 caracteres.',
            'email.unique' => 'Este email já está em uso. Por favor, escolha outro.',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'role.required' => 'Escolha uma das duas roles.',
            'password.confirmed' => 'A senha precisa ser confirmada.',
        ];

        $request->validate($regras, $feedback);
        try {
            $usuario = new User($request->all());
            $usuario->password = Hash::make($request->input('password'));
            $usuario->role = $request->input('role');
            $usuario->save();

            return redirect()->route('admin.dashboard')->with('sucess', 'Usuário cadastrado com sucesso');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function excluir($id)
    {
        try {
            $usuario = User::find($id);
            $usuario->delete();
            return redirect()->route('admin.dashboard')->with('sucess', 'Usuário removido com sucesso');
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    public function editar($id)
    {
        try {
            $usuario = User::find($id);
            return view('admin.editar_usuario', compact('usuario'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function atualizar(Request $request, $id)
    {
        try {
            $usuario = User::find($id);

            $regras = [
                'name' => 'min:4|max:40',
                'password' => 'nullable|min:4',
                'role' => 'in:admin,user',
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'name.min' => 'O campo nome deve ter no mínimo 4 caracteres',
                'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            ];

            $request->validate($regras, $feedback);

            $dadosUsuario = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
            ];

            if ($request->filled('password')) {
                $dadosUsuario['password'] = Hash::make($request->input('password'));
            }

            $usuario->update($dadosUsuario);

            return redirect()->route('admin.dashboard')->with('sucess', 'Usuário editado com sucesso');
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
