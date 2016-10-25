<li class="{{ Request::is('veiculos*') ? 'active' : '' }}">
    @if(Auth::user()->hasRole('gerente') || Auth::user()->hasRole('funcionario'))
        <a href="{!! route('veiculos.index') !!}"><i class="fa fa-edit"></i><span>Veiculos</span></a>
        @else

    @endif
</li>

