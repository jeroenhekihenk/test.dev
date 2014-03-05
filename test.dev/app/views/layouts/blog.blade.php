<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Blog, from | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    {{ HTML::style('reset.css') }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css') }}
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>

</head>
<body>
     
 
    <div class="container">
          <div class="row">
          @yield('content')
          </div>
          @yield('pagination')
    </div><!--/container-->
 
    <div class="container">
        <footer>
            <p>Blog &copy; 2012</p>
        </footer>
      </div>
</body>
</html>