<?php
/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 11/2/16
 * Time: 4:37 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoAPIController extends Controller{

    public function index()
    {
        return Veiculo::all();
    }

    public function store(Request $request){

        $veiculo = Veiculo::create($request->all());

        return $veiculo;
    }

    public function show($id){
        $veiculo = Veiculo::findOrFail($id);
        return $veiculo;
    }

    public function destroy($id){
        Veiculo::destroy($id);
        return response()->json(['message' => 'Veículo removido.']);
    }
}