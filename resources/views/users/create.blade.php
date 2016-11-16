@extends('layouts.app')

@section('title', 'Cadastrar novo usuário')

@section('content')
    <br/><br/>

    <div class="col-md-8 col-md-offset-2">
        <div class="register-box-body">
            <p class="login-box-msg">Registrar novo usuário</p>

            <form method="post" action="{{ route('users.store') }}">

                {!! csrf_field() !!}

                <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nome completo" required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                    @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('roles') ? 'has-error' : '' }}">
                    <?php $i = 0; ?>
                   @foreach($roles as $role)

                           <label class="checkbox-inline"><input type="checkbox" name="roles[{{$i++ }}]" value="{{$role->id}}">{{$role->name}}</label>
                    @endforeach
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('roles') }}</strong>
                            </span>
                        @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Senha" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar senha" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                    @endif
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

        </div>
        <!-- /.form-box -->
    </div>
@endsection