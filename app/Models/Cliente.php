<?php

namespace App\Models;

use App\Cidade;
use App\Estado;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cliente
 * @package App\Models
 * @version October 26, 2016, 5:35 pm UTC
 */
class Cliente extends Model
{

    public $table = 'clientes';


//    protected $dates = ['deleted_at'];


    public $fillable = [
        'nome',
        'telefone',
        'cpf',
        'rg',
        'cnh',
        'endereco',
        'cep',
        'observacoes',
        'cidade_id',
        'estado_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nome' => 'string',
        'telefone' => 'string',
        'cpf' => 'string',
        'rg' => 'string',
        'cnh' => 'string',
        'endereco' => 'string',
        'cep' => 'string',
        'observacoes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'telefone' => 'required',
        'cpf' => 'required|unique:clientes',
        'rg' => 'required|unique:clientes',
        'cnh' => 'required|unique:clientes',
        'estado_id' => 'required',
        'cidade_id' => 'required'
    ];


    public function solicitacoes()
    {
        return $this->hasMany('App\Solicitacao');
    }

    public function locacoes()
    {
        return $this->hasMany('App\Locacao');
    }

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    
}
