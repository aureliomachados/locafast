<table class="table table-responsive" id="veiculos-table">
    <thead>
        <th>Modelo</th>
        <th>Placa</th>
        <th>Chassi</th>
        <th>Cor</th>
        <th>Ano</th>
        <th>Observacao</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($veiculos as $veiculo)
        <tr>
            <td>{!! $veiculo->modelo !!}</td>
            <td>{!! $veiculo->placa !!}</td>
            <td>{!! $veiculo->chassi !!}</td>
            <td>{!! $veiculo->cor !!}</td>
            <td>{!! $veiculo->ano !!}</td>
            <td>{!! $veiculo->observacao !!}</td>
            <td>
                {!! Form::open(['route' => ['veiculos.destroy', $veiculo->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('veiculos.show', [$veiculo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('veiculos.edit', [$veiculo->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>