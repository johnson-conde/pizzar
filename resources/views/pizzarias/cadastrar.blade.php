@extends('layouts.pizzaria')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal"
                    role="form"
                     method="POST"
                     action="{{ route('pizzaria.cadastrar') }}"
                     enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('nome') ? ' has-error' : '' }}">
                            <label for="nome" class="col-md-4 control-label">Nome da Pizzaria</label>

                            <div class="col-md-6">
                                <input id="nome"
                                       type="text"
                                       class="form-control"
                                       name="nome"
                                       value="{{ old('nome') }}">

                                @if ($errors->has('nome'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nome') }}</strong>
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
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <div class="col-md-6">
                                <input id="email"
                                       type="text"
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

                        <div class="form-group{{ $errors->has('imagem') ? ' has-error' : '' }}">
                            <label for="imagem" class="col-md-4 control-label">Imagem</label>

                            <div class="col-md-6">
                                <input id="imagem"
                                       type="file"
                                       class="form-control"
                                       name="imagem"
                                       value="{{ old('imagem') }}">

                                @if ($errors->has('imagem'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('imagem') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username"
                                       type="text"
                                       class="form-control"
                                       name="username"
                                       value="{{ old('username') }}">

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
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
                        <div class="form-group{{ $errors->has('descricao') ? ' has-error' : '' }}">
                            <label for="descricao" class="col-md-4 control-label">Sobre a Pizzaria:</label>

                            <div class="col-md-6">
                                <textarea id="descricao"
                                       type="text"
                                       class="form-control"
                                       name="descricao"
                                       value="{{ old('descricao') }}"></textarea>

                                @if ($errors->has('descricao'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('descricao') }}</strong>
                                    </span>
                                @endif
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
