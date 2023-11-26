<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdministrativoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio()
    {
        try {
            $paginator = User::paginate(8);
            $usuarios = $paginator;
            return view('admin.usuario_inicio', compact('usuarios', 'paginator'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function cadastrar()
    {
        if (Auth::user()->role === 'user') {
            return redirect()->route('usuario.inicio')->with('sucess', 'O usuário não possui permissões para criação de novos usuários');
        }
        return view('admin.usuario_cadastrar');
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

            return redirect()->route('usuario.inicio')->with('sucess', 'Usuário cadastrado com sucesso');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function excluir($id)
    {
        try {
            $usuario = User::find($id);
            if (Auth::user()->role === 'user') {
                return redirect()->route('usuario.inicio')->with('sucess', 'O usuário não possui permissões para excluir de novos usuários');
            } elseif($usuario->name === 'Administrador') {
                return redirect()->route('usuario.inicio')->with('sucess', 'Este administrador não pode ser excluído');
            } else {
                $usuario->delete();
                return redirect()->route('usuario.inicio')->with('sucess', 'Usuário removido com sucesso');
            }
        } catch (\Throwable $th) {
            dd($th);
        }

    }

    public function editar($id)
    {
        try {
            $usuario = User::find($id);
            if (Auth::user()->role === 'user') {
                return redirect()->route('usuario.inicio')->with('sucess', 'O usuário não possui permissões para edição de usuários');
            } elseif($usuario->name === 'Administrador') {
                return redirect()->route('usuario.inicio')->with('sucess', 'Este administrador não pode ser editado');
            } else {
                return view('admin.usuario_editar', compact('usuario'));
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function atualizar(Request $request, $id)
    {
            $usuario = User::find($id);

            if (Auth::user()->role === 'user') {
                return redirect()->route('usuario.inicio')->with('sucess', 'O usuário não possui permissões para edição de usuários');
            } elseif($usuario->name === 'Administrador') {
                return redirect()->route('usuario.inicio')->with('sucess', 'Este administrador não pode ser editado');
            } else {
                $regras = [
                    'name' => 'min:4|max:40',
                    'email' => 'unique:users',
                    'password' => 'nullable|min:4',
                    'role' => 'in:admin,user',
                ];

                $feedback = [
                    'email.unique' => 'Este email já está em uso. Por favor, escolha outro.',
                    'name.min' => 'O campo nome deve ter no mínimo 4 caracteres',
                    'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
                    'password.min' => 'A senha deve ter pelo menos :min caracteres.',
                ];

                $request->validate($regras, $feedback);

                $dadosUsuario = [
                    'name' => $request->input('name'),
                    'role' => $request->input('role'),
                ];

                if ($request->filled('email')) {
                    $dadosUsuario['email'] = $request->input('email');
                }

                if ($request->filled('password')) {
                    $dadosUsuario['password'] = Hash::make($request->input('password'));
                }

                $usuario->update($dadosUsuario);

                return redirect()->route('usuario.inicio')->with('sucess', 'Usuário editado com sucesso');
            }
    }

    public function filtrar(Request $request)
    {
        $name = $request->query('name');
        $email = $request->query('email');
        $role = $request->query('role');

        $query = User::query()
            ->when($name, fn ($query) => $query->where('name', 'like', '%' . $name . '%'))
            ->when($email, fn ($query) => $query->where('email', 'like', '%' . $email . '%'))
            ->when($role, fn ($query) => $query->where('role', $role));

        $paginator = $query->paginate(8);
        $usuarios = $paginator;

        return view('admin.usuario_inicio', compact('usuarios', 'paginator'));
    }
}
