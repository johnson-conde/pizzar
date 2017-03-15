<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta  id="token" name="_token" content="{{ csrf_token() }}"/>
    <title>Pizzar</title>
    <link rel="stylesheet"
          href="{{url('css/vendor.css')}}"
          title="no title"
          charset="utf-8">
    <script src="{{url('js/vendor.js')}}" charset="utf-8"></script>
    <script>
      window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
      ]) !!};
    </script>
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button"
                            class="navbar-toggle collapsed"
                            data-toggle="collapse"
                            data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (!Auth::guard()->check())
                          <li><a href="{{ route('login') }}">Administrador</a></li>
                          <li class="dropdown">
                              <a href="#"
                                 class="dropdown-toggle"
                                 data-toggle="dropdown"
                                 role="button"
                                 aria-expanded="false">
                                  Pizzaria <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                  <li>
                                      <a href="{{ route('pizzaria.login') }}">Login</a>
                                      <a href="{{ route('pizzaria.cadastrar') }}">Cadastrar</a>
                                  </li>
                              </ul>
                          </li>
                        @else
                            <li><a href="{{ route('admin.dashboard') }}"> {{ Auth::guard("pizzaria")->user()->nome }}</a></li>
                            <li class="dropdown">
                                <a href="#"
                                   class="dropdown-toggle"
                                   data-toggle="dropdown"
                                   role="button"
                                   aria-expanded="false">
                                   {{ Auth::guard("pizzaria")->user()->nome }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
     @include('_toggle_dropdown')
</body>
</html>
