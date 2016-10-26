@extends('layouts.app')

@section('title', 'Cadastrar novo veículo')

@section('content')
    <section class="content-header">
        <h1>
            Cadastrar novo veículo
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'veiculos.store']) !!}

                        @include('veiculos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
