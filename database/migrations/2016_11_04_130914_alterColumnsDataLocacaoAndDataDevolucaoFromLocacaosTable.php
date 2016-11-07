<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnsDataLocacaoAndDataDevolucaoFromLocacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locacaos', function (Blueprint $table) {
            $table->date('data_locacao')->change();
            $table->date('data_devolucao')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locacaos', function (Blueprint $table) {
            $table->string('data_locacao')->change();
            $table->string('data_devolucao')->change();
        });
    }
}
