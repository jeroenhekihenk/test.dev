<!DOCTYPE html>
<html lang="nl-NL">
  <head>
    <meta charset="utf-8">
    <title>Digitus Marketing | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    {{ HTML::style('reset.css') }}
    {{ HTML::style('css/main.css') }}
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}

</head>
<body>
     

  @yield('menu')

  @yield('notification')

  @if(Session::has('message'))
    <div class="container session-alert">
      <p class="alert alert-info">{{ Session::get('message') }}</p>
    </div>
  @endif

    <div class="container-fluid">
    <div class="row">
      @yield('sidebar')
      @yield('content')
      @yield('comments')
      @yield('pagination')
    </div>
  </div>
 
  @yield('footer')
  {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
  {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
</body>
</html>