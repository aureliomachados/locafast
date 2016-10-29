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
                    <div class="col-md-6">
                        @include('clientes.detalhes-cliente')
                    </div>

                    <div class="col-md-6 col-sm-6">
                        @include('clientes.alocacoes')
                    </div>

                    <div class="col-md-12 col-sm-12">
                        @include('clientes.solicitacoes')
                        <a href="{!! route('clientes.index') !!}" class="btn btn-primary">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
