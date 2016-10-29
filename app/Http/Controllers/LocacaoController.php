<?php

namespace App\Http\Controllers;

use App\Locacao;
use App\Solicitacao;
use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;

class LocacaoController extends Controller
{

    public function index()
    {
        $locacoes = Locacao::with('cliente', 'veiculo')->get();

        return view('locacoes.index')->with('locacoes', $locacoes);
    }

    //status: 0 cancelado, 1 em andamento, 2 finalizada.

    public function aprovar(Solicitacao $solicitacao, Request $request){

        $locacao = new Locacao();

        $locacao->data_locacao = $solicitacao->data_locacao;
        $locacao->data_devolucao = $solicitacao->data_devolucao;
        $locacao->valor = $solicitacao->valor;
        $locacao->status = 1;
        $locacao->observacoes = $request->get('observacoes');
        $locacao->cliente_id = $solicitacao->cliente_id;
        $locacao->veiculo_id = $solicitacao->veiculo_id;

        $locacao->save();

        //aprovada
        $solicitacao->status = 1;
        $solicitacao->save();

        Flash::success('Solicitação aprovada!');

        return redirect()->route('locacoes.index');
    }

    public function contrato(Locacao $locacao)
    {
        return view('locacoes.contrato')->with('locacao', $locacao);
    }
}
