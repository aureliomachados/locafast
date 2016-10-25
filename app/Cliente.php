<?php

namespace App;


class Cliente extends User
{

    protected $table = "users";

    protected $fillable = ['cpf', 'rg', 'endereco', 'cep', 'cidade', 'observacoes'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
