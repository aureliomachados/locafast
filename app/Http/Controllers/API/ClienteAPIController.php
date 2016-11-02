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
use App\Models\Cliente;

class ClienteAPIController extends Controller{
    public function index()
    {
        return Cliente::all();
    }

    public function show($id){
        return Cliente::findOrFail($id);
    }
}