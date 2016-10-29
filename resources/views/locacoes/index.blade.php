@extends('layouts.app')

@section('title', 'Solicitações')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Lista de locações</h1>
        </div>

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-warning">
                <div class="panel-heading panel-title text-center">
                    Locações
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Locatário</th>
                                <th>Data de alocação</th>
                                <th>Data de devolução</th>
                                <th>Valor</th>
                                <th>Contrato</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($locacoes->reverse() as $locacao)
                                <tr>
                                    <td> {{ $locacao->cliente->nome }}</td>
                                    <td>{{ date('d/m/Y', strtotime($locacao->data_alocacao)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($locacao->data_devolucao)) }}</td>
                                    <td>{{ $locacao->valor }}</td>
                                    <td><a href="{{ route('locacoes.contrato', ['locacao' => $locacao]) }}">Ver contrato</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection