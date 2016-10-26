@extends('layouts.app')

@section('title', 'Cadastrar novo cliente')

@section('content')
    <section class="content-header">
        <h1>
            Cadastrar novo cliente
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'clientes.store']) !!}

                        @include('clientes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
