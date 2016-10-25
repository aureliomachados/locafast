<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnsToNullableUsersTablle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cpf')->nullable()->change();
            $table->string('rg')->nullable()->change();
            $table->string('endereco')->nullable()->change();
            $table->string('cep')->nullable()->change();
            $table->string('cidade')->nullable()->change();
            $table->text('observacoes')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //client attributes
            $table->string('cpf')->change();
            $table->string('rg')->change();
            $table->string('endereco')->change();
            $table->string('cep')->change();
            $table->string('cidade')->change();
            $table->text('observacoes')->change();
        });
    }
}
