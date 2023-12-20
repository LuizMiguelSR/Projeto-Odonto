<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class EsqueciSenhaController extends Controller
{
    public function inicio()
    {
        return view('admin.esqueci_senha');
    }

    public function enviarSenhaEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::broker('users')->sendResetLink(
            $request->only('email')
        );

        $email = $request->email;

        if ($status === Password::RESET_LINK_SENT) {
            return view('admin.email_reset', compact('email'));
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }

    public function senhaResetLink(Request $request, $token = null)
    {
        return view('admin.mudar_senha')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    public function senhaUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:4',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'E-mail não encontrado.']);
        }

        // Se o usuário foi encontrado, atualiza a senha e o token de lembrança
        $user->password = bcrypt($request->password);
        $user->remember_token = \Str::random(60);
        $user->save();

        // Redireciona para a rota de login com uma mensagem de sucesso
        return redirect()->route('admin.inicio')->with('sucess', 'Senha redefinida com sucesso.');
    }
}
