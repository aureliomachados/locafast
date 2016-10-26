@if(Auth::user()->hasRole('gerente') || Auth::user()->hasRole('funcionario'))
    <li class="{{ Request::is('veiculos*') ? 'active' : '' }}">
            <a href="{!! route('veiculos.index') !!}"><i class="fa fa-edit"></i><span>Veiculos</span></a>
    </li>
    <li class="{{ Request::is('clientes*') ? 'active' : '' }}">
        <a href="{!! route('clientes.index') !!}"><i class="fa fa-edit"></i><span>Clientes</span></a>
    </li>
@else
@endif



