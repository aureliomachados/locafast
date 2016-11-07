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

        $gerente = new User();

        $gerente->name = 'Gerente';
        $gerente->email = 'gerente@gerente.com';
        $gerente->password = bcrypt('gerente');

        $gerente->save();
        $gerente->attachRole($role_gerente);

    }
}
