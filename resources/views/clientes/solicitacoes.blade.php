<div class="panel panel-primary">

    <div class="panel-heading panel-title text-center">
        Solicitações
    </div>

    <div class="panel-body">

        <div class="page-header">
            <h3>
                <a class="btn btn-success" href="{{ route('solicitacoes.cadastrar', ['cliente' => $cliente]) }}">Solicitar alocação</a>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach($cliente->solicitacoes as $solicitacao)
                        <tr>
                            <td>{{ ($solicitacao->status == 1) ? "Aprovada" : "Em análise" }}</td>
                            <td>{{ date('d/m/Y', strtotime($solicitacao->data_alocacao)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($solicitacao->data_devolucao)) }}</td>
                            <td>{{ $solicitacao->valor }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>