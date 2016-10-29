<div class="panel panel-default">

    <div class="panel-heading panel-title text-center">
        Solicitações
    </div>

    <div class="panel-body">

        <div class="page-header">
            <h3>
                <a class="btn btn-success" href="{{ route('solicitacoes.cadastrar', ['cliente' => $cliente]) }}">Solicitar locação de veículo</a>
            </h3>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th>Status</th>
                        <th>Data de alocação</th>
                        <th>Data de devolução</th>
                        <th>Valor</th>
                        <th>Contrato</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cliente->solicitacoes->reverse() as $solicitacao)
                        <tr>
                            <td>
                               @if($solicitacao->status == 0)
                                   <span style="color: black;">Em análise</span>
                                   @elseif($solicitacao->status == 1)
                                   <span style="color: green;">Aprovada</span>
                                   @elseif($solicitacao->status == 2)
                                   <span style="color: red;">Recusada</span>
                                   @endif
                            </td>
                            <td>{{ date('d/m/Y', strtotime($solicitacao->data_locacao)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($solicitacao->data_devolucao)) }}</td>
                            <td>{{ $solicitacao->valor }}</td>
                            <td>
                                @if($solicitacao->status == 2)
                                    Não disponível
                                    @else
                                    <a class="btn btn-sm btn-default" href="{{ route('solicitacoes.contrato', ['solicitacao' => $solicitacao]) }}">Emitir contrato</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>