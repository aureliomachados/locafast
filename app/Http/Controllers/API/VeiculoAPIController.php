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

class VeiculoAPIController extends Controller{

    public function index()
    {
        return Veiculo::all();
    }
}