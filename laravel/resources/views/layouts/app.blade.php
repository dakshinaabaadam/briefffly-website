<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Briefffly')</title>
    <script src="{{ asset('js/support.js') }}"></script>
    @stack('head')
  </head>
  <body>
    @yield('content')
  </body>
</html>
