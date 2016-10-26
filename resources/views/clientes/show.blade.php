@extends('layouts.app')

@section('title', 'Cliente ' . $cliente->nome)

@section('content')
    <section class="content-header">
        <h1>
            Cliente
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('clientes.show_fields')
                    <a href="{!! route('clientes.index') !!}" class="btn btn-default">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
