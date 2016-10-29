<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{

    protected $fillable = ['id', 'status', 'data_locacao', 'data_devolucao', 'valor', 'cliente_id', 'veiculo_id', 'observacoes'];

    protected $dates = ['data_locacao', 'data_devolucao'];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function veiculo()
    {
        return $this->belongsTo('App\Models\Veiculo');
    }
}
