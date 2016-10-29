<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Veiculo;
use App\Solicitacao;
use Illuminate\Http\Request;

use App\Http\Requests;

class SolicitacaoController extends Controller
{
    function __construct(){
        //only gerente and funcionario can acess this resource controller.
        $this->middleware('role:gerente|funcionario');
    }

    public function index()
    {
        return Solicitacao::all();
    }

    public function cadastrar(Cliente $cliente)
    {

        //retorna lista dos veículos disponíveis
        $veiculos = Veiculo::where('disponivel', 1)->get();

        return view('solicitacoes.cadastrar')->with('cliente', $cliente)->with('veiculos', $veiculos);
    }

    public function store(Requests\SolicitacaoRequest $request){
        return $request->all();
    }
}
