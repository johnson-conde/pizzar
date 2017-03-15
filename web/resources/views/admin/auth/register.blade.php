@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('primeironome') ? ' has-error' : '' }}">
                            <label for="primeironome" class="col-md-4 control-label">Primeiro nome</label>

                            <div class="col-md-6">
                                <input id="primeironome"
                                       type="text"
                                       class="form-control"
                                       name="primeironome"
                                       value="{{ old('primeironome') }}">

                                @if ($errors->has('primeironome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('primeironome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sobrenome') ? ' has-error' : '' }}">
                            <label for="sobrenome" class="col-md-4 control-label">Sobrenome</label>

                            <div class="col-md-6">
                                <input id="sobrenome"
                                       type="text"
                                       class="form-control"
                                       name="sobrenome"
                                       value="{{ old('sobrenome') }}">

                                @if ($errors->has('sobrenome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sobrenome') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('endereco') ? ' has-error' : '' }}">
                            <label for="endereco" class="col-md-4 control-label">Endereço</label>

                            <div class="col-md-6">
                                <input id="endereco"
                                       type="text"
                                       class="form-control"
                                       name="endereco"
                                       value="{{ old('endereco') }}">

                                @if ($errors->has('endereco'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('endereco') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('contacto') ? ' has-error' : '' }}">
                            <label for="contacto" class="col-md-4 control-label">Contacto</label>

                            <div class="col-md-6">
                                <input id="contacto"
                                       type="text"
                                       class="form-control"
                                       name="contacto"
                                       value="{{ old('contacto') }}">

                                @if ($errors->has('contacto'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('contacto') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email"
                                       type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('sexo') ? ' has-error' : '' }}">
                            <label for="sexo" class="col-md-4 control-label">Sexo</label>

                            <div class="col-md-6">
                                <select id="sexo"
                                       class="form-control"
                                       name="sexo"
                                       value="{{ old('sexo') }}">
                                        <option value="male">Masculino</option>
                                        <option value="female">Feminino</option>
                                </select>

                                @if ($errors->has('primeironome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sexo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password"
                                       type="password"
                                       class="form-control"
                                       name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm"
                                       type="password"
                                       class="form-control"
                                       name="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
