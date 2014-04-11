<!DOCTYPE html>
<html lang="nl-NL">
  <head>
    <meta charset="utf-8">
    <title>Digitus Marketing | {{$post->title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="{{$post->metatitle}}">
    <meta name="description" content="{{$post->metadescription}}">
    <meta name="og:title" content="{{$post->ogtitle}}">
    <meta name="og:description" content="{{$post->ogdescription}}">
    <meta name="og:sitename" content="{{$post->ogsitename}}">
    <meta name="og:url" content="{{$post->ogurl}}">
    <meta name="og:image" content="{{$post->ogimage}}">
    <meta name="og:type" content="{{$post->ogtype}}">
    {{ HTML::style('css/reset.css') }}
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
  {{ HTML::script('/js/main.js') }}
</body>
</html>