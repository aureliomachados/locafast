<?php
/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 11/2/16
 * Time: 4:27 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;

class UserAPIController extends  Controller{

    public function index(){
        return  \App\User::with('roles')->get();
    }
}