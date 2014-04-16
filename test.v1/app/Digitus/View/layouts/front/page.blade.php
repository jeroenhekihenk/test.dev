<!DOCTYPE html>
<html lang="nl-NL">
<head>
  <meta charset="utf-8">
  <title>Digitus Marketing | {{$page->title}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="title" content="{{$page->metatitle}}">
  <meta name="description" content="{{$page->metadescription}}">
  <meta name="robots" content="{{$page->robots}}"> 
  <meta name="og:title" content="{{$page->ogtitle}}">
  <meta name="og:description" content="{{$page->ogdescription}}">
  <meta name="og:sitename" content="{{$page->ogsitename}}">
  <meta name="og:url" content="{{$page->ogurl}}">
  <meta name="og:image" content="{{$page->ogimage}}">
  <meta name="og:type" content="{{$page->ogtype}}">
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
  <section id="{{$page->slug}}">
    <div class="container">
      @yield('sidebar')
      @yield('content')
      @yield('comments')
      @yield('pagination')
    </div>
  </section>
  @yield('footer')
  {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
  {{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
  {{ HTML::script('/js/main.js') }}
</body>
</html>