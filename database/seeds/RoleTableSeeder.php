<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funcionario = new Role();

        $funcionario->name = 'funcionario';
        $funcionario->display_name = "Funcionário";
        $funcionario->description = "Funcionário do LocaFast";

        $funcionario->save();

        $cliente = new Role();
        $cliente->name = 'cliente';
        $cliente->display_name = 'Cliente';
        $cliente->description = "Cliente do LocaFast";

        $cliente->save();

        $gerente = new Role();

        $gerente->name = 'gerente';
        $gerente->display_name = 'Gerente';
        $gerente->description = "Gerente do LocaFast";

        $gerente->save();
    }
}
