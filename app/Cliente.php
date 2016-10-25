<?php

namespace App;


class Cliente extends User
{
    protected $table = 'clientes';

    protected $fillable = ['id', 'cpf', 'rg', 'endereco', 'cep', 'cidade', 'observacoes', 'name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
