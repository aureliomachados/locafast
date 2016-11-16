@extends('layouts.app')

@section('title', 'Editando usuário')

@section('content')
    <br/><br/>

    <div class="col-md-8 col-md-offset-2">
        <div class="register-box-body">
            <p class="login-box-msg">Editando usuário {{ $user->name }}</p>

            <form method="post" action="{{ route('users.update', ['id' => $user->id]) }}">

                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="PUT">

                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Nome completo" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                    @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('roles') ? 'has-error' : '' }}">

                    <label class="checkbox-inline"><input type="checkbox" name="roles[0]" value="5" {{ $user->hasRole('funcionario') ? 'checked' : '' }}>Funcionário</label>
                    <label class="checkbox-inline"><input type="checkbox" name="roles[1]" value="7" {{ $user->hasRole('gerente') ? 'checked' : '' }}>Gerente</label>

                    @if ($errors->has('name'))
                        <span class="help-block">
                                <strong>{{ $errors->first('roles') }}</strong>
                            </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="E-mail" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Salvar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div>
@endsection