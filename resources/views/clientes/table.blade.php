<div class="table-responsive">

    <table class="table" id="clientes-table">
        <thead>
        <th>Nome</th>
        <th>Telefone</th>
        <th>Cpf</th>
        <th>Rg</th>
        <th>Cnh</th>
        <th colspan="3">Ação</th>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td><a href="{!! route('clientes.show', [$cliente->id]) !!}">{!! $cliente->nome !!}</a></td>
                <td>{!! $cliente->telefone !!}</td>
                <td>{!! $cliente->cpf !!}</td>
                <td>{!! $cliente->rg !!}</td>
                <td>{!! $cliente->cnh !!}</td>
                <td>
                    {!! Form::open(['route' => ['clientes.destroy', $cliente->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('clientes.show', [$cliente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('clientes.edit', [$cliente->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>