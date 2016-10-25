<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Veiculo
 * @package App\Models
 * @version October 25, 2016, 1:37 am UTC
 */
class Veiculo extends Model
{
    use SoftDeletes;

    public $table = 'veiculos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'modelo',
        'placa',
        'chassi',
        'cor',
        'ano',
        'observacao'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'modelo' => 'string',
        'placa' => 'string',
        'chassi' => 'string',
        'cor' => 'string',
        'ano' => 'string',
        'observacao' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'modelo' => 'required',
        'placa' => 'required',
        'chassi' => 'required',
        'cor' => 'required',
        'ano' => 'required'
    ];

    
}
