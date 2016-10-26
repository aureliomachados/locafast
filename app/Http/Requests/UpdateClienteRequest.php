<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;

class UpdateClienteRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request)
    {
        $id = $request->get('id');

        $rules = Cliente::$rules;

        $rules['cpf'] = 'required|unique:clientes,id,' . $id;
        $rules['rg'] = 'required|unique:clientes,id,' . $id;
        $rules['cnh'] = 'required|unique:clientes,id,' . $id;

        return $rules;
    }
}
