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

<div class="blogroll container ">

@foreach($posts as $post)	
	@foreach($post->categories as $categorie)
		<div class="panel panel-info">
			<div class="panel-heading"><a href="{{URL::to('categories/'.$categorie->name)}}" title="{{$categorie->name}}" alt="{{$categorie->name}}">Geplaatst in: {{$categorie->name}}</a></div>
			<div class="panel panel-body panel-warning">
				<div class="panel-heading">{{$post->title}}</div>
				<div class="panel-body">{{ $post->body}}</div>
			</div>
		</div>
	@endforeach
@endforeach


</div>

@stop

@section('pagination')
	<div class="row">
		<div class="span8">
			
		</div>
	</div>
@stop