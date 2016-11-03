<?php
/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 11/2/16
 * Time: 4:36 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;

//client base class
use App\Http\Requests\CreateClienteRequest;
use App\Models\Cliente;
use Dingo\Api\Exception\ValidationHttpException;

class ClienteAPIController extends Controller{
    public function index()
    {
        return Cliente::all();
    }

    public function show($id){
        return Cliente::findOrFail($id);
    }

    public function store(CreateClienteRequest $request){
        try{
            $cliente = Cliente::create($request->all());
            return $cliente;
        }
        catch(ValidationHttpException $e){
            return $e->getMessage();
        }
    }
}