<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    protected $fillable = ['data_locacao', 'data_devolucao', 'observacoes', 'valor', 'status', 'cliente_id', 'veiculo_id'];

    public function veiculo()
    {
        return $this->belongsTo('App\Models\Veiculo');
    }

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }
}
