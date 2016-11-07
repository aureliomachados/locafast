<div class="panel panel-default">
    <div class="panel-heading panel-title text-center">Locações registradas</div>

    <div class="panel-body">

        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Locatário</th>
                    <th>Data de locação</th>
                    <th>Data de devolução</th>
                    <th>Valor</th>
                </tr>

                @foreach($veiculo->locacoes->sortBy('data_locacao') as $locacao)
                    <tr>
                        <td>{{ $locacao->cliente->nome }}</td>
                        <td>{{ $locacao->data_locacao->format('d/m/Y') }}</td>
                        <td>{{ $locacao->data_devolucao->format('d/m/Y') }}</td>
                        <td>{{ $locacao->valor }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>