@extends('layouts.app')

@section('title', 'Veículos')

@section('content')
    <section class="content-header">

        <form action="{!! route('veiculos.index') !!}" class="form-inline">
            <div class="form-group">
                <label for="placa" class="control-label">Placa:</label>
                <input class="form-control" type="search" name="placa" placeholder="Digite o número da placa" required/>
            </div>
            <div class="form-group">
                <input class="btn btn-success btn-sm" type="submit" value="Pesquisar"/>
            </div>
        </form>

        <br/>

        <h1 class="pull-left">Veículos</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('veiculos.create') !!}">Cadastrar novo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('veiculos.table')
            </div>
        </div>
    </div>
@endsection

