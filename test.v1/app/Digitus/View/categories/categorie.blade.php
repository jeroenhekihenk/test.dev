@extends('layouts.front.main')

@section('title')
Blog
@stop

@section('menu')
	@include('layouts.front.menus.homemenu')
@stop

@section('sidebar')

@stop

@section('content')

<div class="blogroll container col-sm-offset-2 col-md-offset-2 col-xs-offset-2 col-lg-offset-2">


		<div class="panel">
			<div class="panel panel-info">
				<div class="panel-heading">{{$categorie->name}}</div>
			</div>
			<div class="panel-body">
				<h1>Related posts</h1>
				@foreach($categorie->posts as $post)
				<div class="panel panel-default">
					<div class="panel-heading"><h2>{{ $post->title }}</h2></div>
					<div class="panel-body"><p>{{ $post->body }}</p></div>
				</div>
				@endforeach
			</div>
		</div>



</div>

@stop

@section('pagination')
	<div class="row">
		<div class="span8">
			
		</div>
	</div>
@stop