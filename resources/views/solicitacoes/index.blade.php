@extends('layouts.app')

@section('title', 'Solicitações')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1>Lista de solicitações</h1>
        </div>

        @include('flash::message')

        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-warning">
                <div class="panel-heading panel-title text-center">
                    Solicitações pendentes
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Locatário</th>
                                <th>Veículo/Placa</th>
                                <th>Data de locação</th>
                                <th>Data de devolução</th>
                                <th>Valor</th>
                                <th>Contrato</th>
                                <th colspan="3">Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($solicitacoesPendentes->sortByDesc('valor') as $solicitacao)
                                <tr>
                                    <td> {{ $solicitacao->cliente->nome }}</td>
                                    <td>{{ $solicitacao->veiculo->modelo }} / {{ $solicitacao->veiculo->placa }}</td>
                                    <td>{{ date('d/m/Y', strtotime($solicitacao->data_locacao)) }}</td>
                                    <td>{{ date('d/m/Y', strtotime($solicitacao->data_devolucao)) }}</td>
                                    <td>{{ $solicitacao->valor }}</td>
                                    <td><a href="{{ route('solicitacoes.contrato', ['solicitacao' => $solicitacao]) }}">Ver contrato</a></td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAprovar">Aprovar</button>
                                        @include('solicitacoes.partials.modal-aprovar-solicitacao')
                                    <td/>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalReprovar">Reprovar</button>
                                        @include('solicitacoes.partials.modal-cancelar-solicitacao')
                                    </td>
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