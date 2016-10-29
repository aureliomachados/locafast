<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locacaos', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('status');
            $table->string('observacoes')->nullable();
            $table->string('data_locacao');
            $table->string('data_devolucao');
            $table->double('valor');

            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->integer('veiculo_id')->unsigned();
            $table->foreign('veiculo_id')->references('id')->on('veiculos');

            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locacaos');
    }
}
