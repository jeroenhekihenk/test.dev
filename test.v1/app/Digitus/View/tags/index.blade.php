@extends('layouts.front.main')

@section('title')
	Tag overzicht
@stop

@section('menu')
	@include('layouts.front.menus.digimenu')
@stop

@section('content')
<div class="blogroll container">
	@foreach($posts as $post)	
		@foreach($post->tags as $tag)
			<div class="panel panel-info">
				<div class="panel-heading"><a href="{{URL::to('tags/'.$tag->name)}}" title="{{$tag->name}}" alt="{{$tag->name}}">{{$tag->name}}</a></div>
				<div class="panel panel-body panel-warning">
					<div class="panel-heading">{{$post->title}}</div>
					<div class="panel-body">{{ $post->body}}</div>
					<a href="{{URL::to('blog/'.$post->slug) }}" class="btn btn-info btn-md">bekijk post</a>
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