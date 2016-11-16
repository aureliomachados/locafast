@extends('layouts.app')

@section('title', 'Usuário ' . $user->name)

@section('content')
    <section class="content-header">
        <h1>
            Usuário
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nome</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Papel</th>
                                <td>
                                    @foreach($user->roles as $role)
                                        {{ $role->name . ' ' }}
                                    @endforeach
                                </td>
                            </tr>
                        </table>
                    </div>

                    @if(!$user->hasRole('funcionario'))
                        <a href="{!! route('users.index') !!}" class="btn btn-default">Voltar</a>
                        @else
                        <a href="{!! url('home') !!}" class="btn btn-default">Início</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
