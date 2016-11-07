@extends('layouts.app')

@section('title', 'Veículo ' . $veiculo->modelo)

@section('content')
    <section class="content-header">
        <h1>
            Veículo
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('veiculos.show_fields')

                    @include('veiculos.locacoes')
                    <a href="{!! route('veiculos.index') !!}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
