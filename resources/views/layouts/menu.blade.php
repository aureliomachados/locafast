@if(Auth::user()->hasRole('gerente') || Auth::user()->hasRole('funcionario'))
    <li class="{{ Request::is('veiculos*') ? 'active' : '' }}">
            <a href="{!! route('veiculos.index') !!}"><i class="fa fa-edit"></i><span>Veiculos</span></a>
    </li>
    <li class="{{ Request::is('clientes*') ? 'active' : '' }}">
        <a href="{!! route('clientes.index') !!}"><i class="fa fa-edit"></i><span>Clientes</span></a>
    </li>

    @if(Auth::user()->hasRole('gerente'))
        <li class="{{ Request::is('solicitacoes*') ? 'active' : '' }}">
            <a href="{!! route('solicitacoes.index') !!}"><i class="fa fa-edit"></i><span>Solicitações</span></a>
        </li>

    @endif

@else
@endif



