<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class LoginController extends Controller
{
    public function inicio()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $regras = [
            'email' => 'email',
            'password' => 'required|min:4',
        ];

        $feedback = [
            'required' => 'O campo :attribute deve ser preenchido',
            'password.required' => 'A senha é obrigatória.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
        ];

        $request->validate($regras, $feedback);

        $credenciais = $request->only('email', 'password');

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();

            return redirect()->intended('administrativo/dashboard');

        }
        
        return back()->withErrors([
            'email' => 'E-mail ou senha incorretos.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        // Deslogar o usuário atual
        Auth::guard('web')->logout();

        // Limpar a sessão do usuário atual
        Session::flush();

        // Invalidar a sessão atual
        $request->session()->invalidate();

        // Regenerar o token de sessão
        $request->session()->regenerateToken();

        return redirect()->route('admin.inicio');
    }
}
