<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Consulta;
use App\Models\Paciente;

class ConsultasController extends Controller
{
    public function __construct(Consulta $consulta)
    {
        $this->middleware('auth');
        $this->consulta = $consulta;
    }

    public function inicio()
    {
        $paginator = Consulta::orderBy('data_consulta', 'desc')->paginate(8);
        $consultas = $paginator;
        return view('admin.consulta_inicio', compact('consultas', 'paginator'));
    }

    public function marcar()
    {
        $pacientes = Paciente::all();
        return view('admin.consulta_marcar', compact('pacientes'));
    }

    public function armazenar(Request $request)
    {

        $request->validate($this->consulta->rules(), $this->consulta->feedback());

        $consulta = new Consulta($request->all());
        /* $mensagem = 'Olá '. $consulta->paciente->nome . ', não se esqueça de sua consulta ás ' . date('H:i', strtotime($consulta->data_consulta));
        $telefone = $consulta->paciente->telefone;

        $this->enviarMensagem($telefone, $mensagem); */

        $consulta->save();
        return redirect()->route('consulta.inicio')->with('sucess', 'Consulta marcada com sucesso!');
    }

    public function desmarcar($id)
    {
        $consulta = Consulta::find($id);
        $consulta->delete();
        return redirect()->route('consulta.inicio')->with('sucess', 'Consulta desmarcada com sucesso');
    }

    public function remarcar($id)
    {
        $consulta = Consulta::find($id);
        return view('admin.consulta_remarcar', compact('consulta'));
    }

    public function atualizar(Request $request, $id)
    {

        $consulta = Consulta::find($id);

        $request->validate($consulta->rules(), $consulta->feedback());

        $dadosConsulta = [
            'data_consulta' => $request->input('data_consulta'),
            'descricao' => $request->input('descricao'),
        ];
        
        $consulta->update($dadosConsulta);
        /* $mensagem = 'Olá '. $consulta->paciente->nome . ', sua consulta foi remarcada para às' . date('H:i', strtotime($consulta->data_consulta));
        $telefone = $consulta->paciente->telefone;

        $this->enviarMensagem($telefone, $mensagem); */
        return redirect()->route('consulta.inicio')->with('sucess', 'Consulta remarcada com sucesso');
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

    public function filtrar(Request $request)
    {
        $nome = $request->query('nome');
        $descricao = $request->query('descricao');
        $dataInicio = $request->query('data_inicio');
        $dataFim = $request->query('data_fim');

        $query = Consulta::query()
            ->when($nome, function ($query) use ($nome) {
                $query->whereHas('paciente', function ($subQuery) use ($nome) {
                    $subQuery->where('nome', 'like', '%' . $nome . '%');
                });
            })
            ->when($descricao, fn ($query) => $query->where('descricao', 'like', '%' . $descricao . '%'))
            ->when($dataInicio, function ($query) use ($dataInicio, $dataFim) {
                $dataInicio = date('Y-m-d H:i:s', strtotime($dataInicio));
                $query->where('created_at', '>=', $dataInicio);
            })
            ->when($dataFim, function ($query) use ($dataInicio, $dataFim) {
                $dataFim = date('Y-m-d H:i:s', strtotime($dataFim));
                $query->where('created_at', '<=', $dataFim);
            });

        $paginator = $query->paginate(8);
        $consultas = $paginator;

        return view('admin.consulta_inicio', compact('consultas', 'paginator'));
    }
}
