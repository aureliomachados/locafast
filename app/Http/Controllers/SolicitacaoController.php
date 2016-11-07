<?php

namespace App\Http\Controllers;

use App\Locacao;
use App\Models\Cliente;
use App\Models\Veiculo;
use App\Solicitacao;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;

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


        if($solicitacao['data_locacao'] < Carbon::today() || $solicitacao['data_devolucao'] < Carbon::today()){
            flash()->warning("A data não pode ser anterior ao dia de hoje.");
            return redirect()->back()->withInput($request->all());
        }
        else if($solicitacao['data_locacao'] > $solicitacao['data_devolucao']){
            flash()->warning("A data de locação não pode ser após a data de devolução");
            return redirect()->back()->withInput($request->all());
        }

        if($this->verificaDisponibilidadeVeiculo($solicitacao)){

        $solicitacao = Solicitacao::create($solicitacao);

        $veiculo = $solicitacao->veiculo;

        //torna o veículo temporariamente indisponível / desabilitado pra teste de método de verificação de disponibilidade
        //$veiculo->disponivel = 0;

        $veiculo->save();

        flash()->success('Solicitação cadastrada!');

        return redirect()->route('clientes.show', ['cliente' => $request->get('cliente_id')]);
        }
        else{
            flash()->warning("Veículo indisponível no período solicitado!");
            return redirect()->back()->withInput($request->all());
        }
    }

    //usar este método no cancelamento de LOCAÇÃO
    public function update($id, Request $request){

        $solicitacao = Solicitacao::find($id);

        //cancela o
        $solicitacao->update($request->all());

        $veiculo = $solicitacao->veiculo;

        //torna o veiculo disponível novamente
        $veiculo->disponivel = 1;

        $veiculo->save();

        Flash::warning("Solicitação cancelada");

        return redirect()->route('clientes.index');
    }

    public function contrato(Solicitacao $solicitacao)
    {
        return view('solicitacoes.contrato')->with('solicitacao', $solicitacao);
    }

    /**
     * @param $solicitacao Solicitação a verificar disponibilidade de veículo
     * @return bool caso retorne true, o veiculo estará disponível, se falso o veículo não
     * estará disponível.
     */
    protected function verificaDisponibilidadeVeiculo($solicitacao){

        $locacoes = DB::select("select * from locacaos WHERE veiculo_id = {$solicitacao['veiculo_id']} AND ((data_locacao BETWEEN '${solicitacao['data_locacao']}' and '{$solicitacao['data_devolucao']}') OR (data_devolucao BETWEEN '${solicitacao['data_locacao']}' and '{$solicitacao['data_devolucao']}')) ");

        if(count($locacoes) > 0){
            //não está disponível
            return false;
        }
        else{
            //está disponível
            return true;
        }
    }
}
