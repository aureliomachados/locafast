@extends('layouts.app')

@section('title', 'Usuários')

@section('content')
    <section class="content-header">

        <form action="{!! route('users.index') !!}" class="form-inline">
            <div class="form-group">
                <label for="email" class="control-label">E-mail:</label>
                <input class="form-control" type="search" name="email" placeholder="Digite o e-mail" required/>
            </div>
            <div class="form-group">
                <input class="btn btn-success btn-sm" type="submit" value="Pesquisar"/>
            </div>
        </form>

        <br/>

        <h1 class="pull-left">Usuários</h1>
        <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('users.create') !!}">Cadastrar novo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('users.table')
            </div>
        </div>
    </div>
@endsection

