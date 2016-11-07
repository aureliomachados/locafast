<div class="panel panel-primary">

    <div class="panel-heading panel-title text-center">
        Locações
    </div>

    <div class="panel-body">
        <div class="table-responsive">
            @if($cliente->locacoes->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Locação</th>
                        <th>Devolução</th>
                        <th>Valor</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cliente->locacoes->reverse() as $locacao)
                       <tr>
                        <td>{{ date('d/m/Y', strtotime($locacao->data_locacao)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($locacao->data_devolucao)) }}</td>
                        <td>{{ $locacao->valor }}</td>
                        <td>
                            @if($locacao->status == 0)
                                Cancelado
                                @elseif($locacao->status == 1)
                                Em andamento
                                @elseif($locacao->status == 2)
                                Finalizado
                            @endif
                        </td>
                       </tr>
                    @endforeach
                </tbody>
            </table>
                @else
                Ainda não fez locações.
            @endif
        </div>
    </div>
</div>
