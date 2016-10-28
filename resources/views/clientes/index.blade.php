@extends('layouts.app')

@section('title', 'Clientes')

@section('content')

    <section class="content-header">

        <form action="{!! route('clientes.index') !!}" class="form-inline">
            <div class="form-group">
                <label for="cpf" class="control-label">CPF:</label>
                <input class="form-control" type="search" name="cpf" placeholder="Digite o CPF" required/>
            </div>
            <div class="form-group">
                <input class="btn btn-success btn-sm" type="submit" value="Pesquisar"/>
            </div>
        </form>

        <br/>

        <h1 class="pull-left">Clientes</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('clientes.create') !!}">Cadastrar novo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('clientes.table')
            </div>
        </div>
    </div>
@endsection

