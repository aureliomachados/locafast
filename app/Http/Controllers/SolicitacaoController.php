<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Veiculo;
use App\Solicitacao;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class SolicitacaoController extends Controller
{
    function __construct(){
        //only gerente and funcionario can acess this resource controller.
        $this->middleware('role:gerente|funcionario', ['only' => ['cadastrar', 'store']]);

        //lista de solicitações cadastradas a serem analisadas "apenas" pelo gerente
        $this->middleware('role:gerente', ['only' => ['index']]);
    }

    public function index()
    {
        $solicitacoesPendentes = Solicitacao::where('status', 0)->with(['cliente', 'veiculo'])->get();

        return view('solicitacoes.index')->with('solicitacoesPendentes', $solicitacoesPendentes);
    }

    public function cadastrar(Cliente $cliente)
    {

        //retorna lista dos veículos disponíveis
        $veiculos = Veiculo::where('disponivel', 1)->get();

        return view('solicitacoes.cadastrar')->with('cliente', $cliente)->with('veiculos', $veiculos);
    }

    public function store(Requests\SolicitacaoRequest $request){

        $solicitacao = $request->all();

        $solicitacao['status'] = 0;
        $solicitacao['data_locacao'] = Carbon::createFromFormat('d/m/Y', $solicitacao['data_locacao']);
        $solicitacao['data_devolucao'] = Carbon::createFromFormat('d/m/Y', $solicitacao['data_devolucao']);

        Solicitacao::create($solicitacao);

        flash()->success('Solicitação cadastrada!');

        return redirect()->route('clientes.show', ['cliente' => $request->get('cliente_id')]);
    }

    public function contrato(Solicitacao $solicitacao)
    {
        return view('solicitacoes.contrato')->with('solicitacao', $solicitacao);
    }
}
