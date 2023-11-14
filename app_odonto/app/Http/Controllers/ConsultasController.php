<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Consulta;
use App\Models\Paciente;

class ConsultasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function inicio()
    {
        try {
            $paginator = Consulta::orderBy('data_consulta', 'desc')->paginate(8);
            $consultas = $paginator;
            return view('admin.consulta_inicio', compact('consultas', 'paginator'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function marcar()
    {
        try {
            $pacientes = Paciente::all();
            return view('admin.consulta_marcar', compact('pacientes'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function armazenar(Request $request)
    {

        $regras = [
            'paciente_id' => 'required',
            'data_consulta' => 'required',
            'descricao' => 'required',
        ];

        $feedback = [
            'required' => 'O campo :attribute é requerido.',
        ];

        $request->validate($regras, $feedback);
        try {
            $consulta = new Consulta($request->all());
            $mensagem = 'Olá '. $consulta->paciente->nome . ', não se esqueça de sua consulta ás ' . date('H:i', strtotime($consulta->data_consulta));
            $telefone = $consulta->paciente->telefone;

            $this->enviarMensagem($telefone, $mensagem);

            $consulta->save();
            return redirect()->route('consulta.inicio')->with('sucess', 'Consulta marcada com sucesso!');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function desmarcar($id)
    {
        try {
            $consulta = Consulta::find($id);
            $consulta->delete();
            return redirect()->route('consulta.inicio')->with('sucess', 'Consulta desmarcada com sucesso');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function remarcar($id)
    {
        try {
            $consulta = Consulta::find($id);
            return view('admin.consulta_remarcar', compact('consulta'));
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function atualizar(Request $request, $id)
    {

        $consulta = Consulta::find($id);

        $regras = [
            'data_consulta' => 'required',
            'descricao' => 'required',
        ];

        $feedback = [
            'required' => 'O campo :attribute é requerido.',
        ];

        $request->validate($regras, $feedback);

        try {
            $dadosConsulta = [
                'data_consulta' => $request->input('data_consulta'),
                'descricao' => $request->input('descricao'),
            ];
            $consulta->update($dadosConsulta);
            $mensagem = 'Olá '. $consulta->paciente->nome . ', sua consulta foi remarcada para às' . date('H:i', strtotime($consulta->data_consulta));
            $telefone = $consulta->paciente->telefone;

            $this->enviarMensagem($telefone, $mensagem);
            return redirect()->route('consulta.inicio')->with('sucess', 'Consulta remarcada com sucesso');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function enviarMensagem($telefone, $mensagem)
    {
        $accessToken = env('FACEBOOK_ACCESS_TOKEN');
        $graphUrl = env('FACEBOOK_GRAPH_URL');

        $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken,
                'Content-Type' => 'application/json',
            ])
            ->post($graphUrl, [
                'messaging_product' => 'whatsapp',
                'to' => $telefone,
                'type' => 'template', // Template usado na criação do app no Meta
                'template' => [
                    'name' => 'hello_world', // Modelo definido no Meta
                    'language' => ['code' => 'en_US'],
                ],
            ]);

    }
}
