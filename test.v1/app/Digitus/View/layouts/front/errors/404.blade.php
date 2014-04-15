<!DOCTYPE html>

<html lang="nl-NL">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Digitus Marketing | 4oh4</title>
	{{ HTML::style('/css/reset.css') }}
	{{ HTML::style('/css/404.css') }}
</head>
<body>




	@yield('content')


	{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
	{{ HTML::script('//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js') }}
	{{ HTML::script('/js/404.js') }}
</body>
</html>