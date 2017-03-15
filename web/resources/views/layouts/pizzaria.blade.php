<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta  id="token" name="_token" content="{{ csrf_token() }}"/>
        <title>Pizzar</title>
        <link rel="stylesheet"
              href="{{url('css/admin.css')}}"
              title="no title"
              charset="utf-8">
        <script src="{{url('js/admin.js')}}"
                charset="utf-8"></script>
        <!-- Scripts -->
        <script>
          window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
          ]) !!};
        </script>
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>
        @yield('styles')
    </head>
    <body class="topnav-fixed">
     <div id="wrapper" class="wrapper">
      @include('admin.topBar')
      @include('admin.leftBar')
      <div id="main-content-wrapper" class="content-wrapper">
        @yield("content")
        <footer class="footer">
         &copy; 2016 The Develovers
        </footer>
      </div>
     </div>
     @include('_toggle_dropdown')
     @yield('scripts')
    </body>
</html>
