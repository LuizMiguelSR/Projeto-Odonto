<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdministrativoController extends Controller
{
    public function __construct(User $user)
    {
        $this->middleware('auth');
        $this->user = $user;
    }

    public function inicio()
    {
        $paginator = User::paginate(8);
        $usuarios = $paginator;
        return view('admin.usuario_inicio', compact('usuarios', 'paginator'));
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

        $request->validate($this->user->rules(), $this->user->feedback());

        $usuario = new User($request->all());
        $usuario->password = Hash::make($request->input('password'));
        $usuario->role = $request->input('role');
        $usuario->save();

        return redirect()->route('usuario.inicio')->with('sucess', 'Usuário cadastrado com sucesso');
    }

    public function excluir($id)
    {
        $usuario = User::find($id);
        if (Auth::user()->role === 'user') {
            return redirect()->route('usuario.inicio')->with('sucess', 'O usuário não possui permissões para excluir de novos usuários');
        } elseif($usuario->name === 'Administrador') {
            return redirect()->route('usuario.inicio')->with('sucess', 'Este administrador não pode ser excluído');
        } else {
            $usuario->delete();
            return redirect()->route('usuario.inicio')->with('sucess', 'Usuário removido com sucesso');
        }

    }

    public function editar($id)
    {
        $usuario = User::find($id);
        if (Auth::user()->role === 'user') {
            return redirect()->route('usuario.inicio')->with('sucess', 'O usuário não possui permissões para edição de usuários');
        } elseif($usuario->name === 'Administrador') {
            return redirect()->route('usuario.inicio')->with('sucess', 'Este administrador não pode ser editado');
        } else {
            return view('admin.usuario_editar', compact('usuario'));
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

            $request->validate($usuario->rules(), $usuario->feedback());

            $dadosUsuario = [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'role' => $request->input('role'),
            ];

            if ($request->filled('password')) {
                $request['password'] = Hash::make($request->input('password'));
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
