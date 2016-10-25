<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\Cliente;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_funcionario = Role::where('name', 'funcionario')->first();
        $role_cliente = Role::where('name', 'cliente')->first();
        $role_gerente = Role::where('name', 'gerente')->first();

        $funcionario = new User();

        $funcionario->name = "Funcionário";
        $funcionario->email = "funcionario@funcionario.com";
        $funcionario->password = bcrypt("funcionario");

        $funcionario->save();
        $funcionario->attachRole($role_funcionario);

        $cliente = new Cliente();

        $cliente->name = "Cliente";
        $cliente->email = "cliente@cliente.com";
        $cliente->password = bcrypt("cliente");
        $cliente->cpf = "979797545";
        $cliente->rg = "9797974594";
        $cliente->endereco = "endereço tal";
        $cliente->cep = "540970458";
        $cliente->cidade = "Cap City";
        $cliente->observacoes = "asdfx";

        $cliente->save();
        $cliente->attachRole($role_cliente);

        $gerente = new User();

        $gerente->name = 'Gerente';
        $gerente->email = 'gerente@gerente.com';
        $gerente->password = bcrypt('gerente');

        $gerente->save();
        $gerente->attachRole($role_gerente);

    }
}
