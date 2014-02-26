<!DOCTYPE html>

<html lang="nl-NL">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Digitus Marketing | @yield('title')</title>
	{{ HTML::style('css/reset.css') }}
	{{ HTML::style('css/main.css') }}
	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/bootstrap-theme.css') }}
</head>
<body>
@include('layouts.menu.mainmenu')
@yield('notification')

	@if(Session::has('message'))
		<div class="container">
			<p class="alert">{{ Session::get('message') }}</p>
		</div>
	@endif

	<div id="sidebar">
		@yield('sidebar')
	</div>

	<div id="content">
		@yield('content')
	</div>

	@include('layouts.footer.mainfooter')
</body>
</html>