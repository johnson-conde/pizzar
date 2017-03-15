<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Pizzar - </title>
      <link rel="stylesheet"
            href="{{url('css/vendor.css')}}"
            title="no title"
            charset="utf-8">
      <script src="{{url('js/vendor.js')}}"
              charset="utf-8"></script>
      <style>
          html, body {
              background-color: #fff;
              color: #636b6f;
              font-family: 'Raleway', sans-serif;
              font-weight: 100;
              height: 100vh;
              margin: 0;
          }

          .full-height {
              height: 100vh;
          }

          .flex-center {
              align-items: center;
              display: flex;
              justify-content: center;
          }

          .position-ref {
              position: relative;
          }

          .top-right {
              position: absolute;
              right: 10px;
              top: 18px;
          }

          .content {
              text-align: center;
          }

          .title {
              font-size: 84px;
          }

          .links > a {
              color: #636b6f;
              padding: 0 25px;
              font-size: 12px;
              font-weight: 600;
              letter-spacing: .1rem;
              text-decoration: none;
              text-transform: uppercase;
          }

          .m-b-md {
              margin-bottom: 30px;
          }
      </style>
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
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                      @if (Route::has('login'))
                        @if (Auth::guard()->check())
                           <li><a href="{{ url('/home') }}">Administrador</a></li>
                        @elseif (Auth::guard("pizzaria")->check())
                            <li><a href="{{ url('/pizzarias/dashboard') }}"> {{Auth::guard("pizzaria")->user()->nome}}</a></li>
                        @else
                          <li><a href="{{ route('login') }}">Administrador</a></li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                  Pizzaria <span class="caret"></span>
                              </a>
                              <ul class="dropdown-menu" role="menu">
                                  <li>
                                      <a href="{{ route('pizzaria.login') }}">Login</a>
                                      <a href="{{ route('pizzaria.cadastrar') }}">Cadastrar</a>
                                  </li>
                              </ul>
                          </li>
                        @endif
                      @endif
                    </ul>
                </div>
              </div>
            </div>
          </nav>
          @yield("content")
          @include('_toggle_dropdown')
        </div>
    </body>
</html>
