@extends('layouts.app')

@section('title', 'Cadastrar nova solicitação de alocação')

@section('content')

    <section class="content-header">
        <h1>
            Solicitar alocação
        </h1>
    </section>
    <div class="content">

        <div class="clearfix"></div>

        @include('flash::message')
            @foreach ($errors->all() as $error)
                <div class="well alert-danger">{{ $error }}</div>
            @endforeach
        <div class="clearfix"></div>

        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    <form method="POST" action="{{ route('solicitacoes.store') }}" accept-charset="UTF-8">
                        {!! csrf_field() !!}
                        <input type="hidden" name="cliente_id" value="{{ $cliente->id }}"/>


                        <div class="form-group col-sm-6">
                            <label for="data_locacao">Data de locação:</label>
                            <input class="form-control" name="data_locacao" type="text" id="data_locacao" placeholder="Ex: 10/10/2010">
                        </div>


                        <div class="form-group col-sm-6">
                            <label for="data_devolucao">Data de devolução:</label>
                            <input class="form-control" name="data_devolucao" type="text" id="data_devolucao" placeholder="Ex: 10/10/2010">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="valor">Valor:</label>
                            <input class="form-control" name="valor" type="text" id="valor" placeholder="Ex: 29.90">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="veiculo_id">Veículo</label>
                            <select class="form-control" name="veiculo_id" id="veiculo_id">
                                @foreach($veiculos as $veiculo)
                                    <option value="{{ $veiculo->id }}"> <b>{{ $veiculo->modelo }}</b> - {{ $veiculo->cor }} / {{ $veiculo->ano }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Field -->
                        <div class="form-group col-sm-12">
                            <input class="btn btn-primary" type="submit" value="Solicitar">
                            <a href="http://localhost:8000/clientes" class="btn btn-default">Cancelar</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection