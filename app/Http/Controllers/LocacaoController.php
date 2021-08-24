<?php

namespace App\Http\Controllers;

use App\Locacao;
use App\Models\Veiculo;
use App\Solicitacao;
use Illuminate\Http\Request;

use App\Http\Requests;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\DB;

class LocacaoController extends Controller
{

    public function index()
    {
        $locacoes = Locacao::with('cliente', 'veiculo')->get();

        return view('locacoes.index')->with('locacoes', $locacoes);
    }

    //status: 0 cancelado, 1 em andamento, 2 finalizada.

    public function aprovar(Solicitacao $solicitacao, Request $request){

        if($this->verificaDisponibilidadeVeiculo($solicitacao)){
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

            $veiculo = Veiculo::find($locacao->veiculo_id);

            $veiculo->status = 0;
            $veiculo->save();

            Flash::success('Solicitação aprovada!');

            return redirect()->route('solicitacoes.index');
        }
        else{
            Flash::warning('O veículo já está indisponível para o período.');
            return redirect()->route('solicitacoes.index');
        }
    }

    public function contrato(Locacao $locacao)
    {
        return view('locacoes.contrato')->with('locacao', $locacao);
    }


    /**
     * @param $solicitacao Solicitação a verificar disponibilidade de veículo
     * @return bool caso retorne true, o veiculo estará disponível, se falso o veículo não
     * estará disponível.
     */
    protected function verificaDisponibilidadeVeiculo($solicitacao){

        //$locacoes = DB::select("select * from locacaos WHERE veiculo_id = {$solicitacao['veiculo_id']} AND ((data_locacao BETWEEN '${solicitacao['data_locacao']}' and '{$solicitacao['data_devolucao']}') OR (data_devolucao BETWEEN '${solicitacao['data_locacao']}' and '{$solicitacao['data_devolucao']}')) ");

        $veiculo = Veiculo::findById($solicitacao['veiculo_id']);

        if($veiculo->disponivel){
            //está disponível
            return true;
        }
        else{
            //não está disponível
            return false;
        }
    }
}
