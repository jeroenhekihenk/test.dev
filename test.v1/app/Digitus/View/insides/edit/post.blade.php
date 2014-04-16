@extends('layouts.back.admin')

@section('title')
	{{ $post->post_title }}
@stop

@section('menu')
	@include('layouts.front.menus.homemenu')
@stop

@section('sidebar')

@stop

@section('content')

<div class="blogroll container col-sm-offset-2 col-md-offset-2 col-xs-offset-2 col-lg-offset-2">

	

		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 pull-left col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-offset-1 panel panel-info post-{{$post->id}}">
			
			{{ Form::open(array('method'=>'POST')) }}

			<div class="form-group">
				{{ Form::label('title', 'Post Title')}}
				{{ Form::text('title', $post->title, array('class'=>'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('slug', 'Post Slug')}}
				{{ Form::text('slug', $post->slug, array('class'=>'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('body', 'Post Body')}}
				{{ Form::text('body', $post->body, array('class'=>'form-control')) }}
			</div>

			{{ Form::submit('Save', array('class'=>'btn btn-success')) }}

			{{ Form::close() }}

			<div class="blogbottom">
				<a href="{{{ URL::to('') }}}" class="label label-warning">&raquo; Edit Tags</a> <a href="{{{ URL::to('') }}}" class="label label-warning">&raquo; Edit Categories</a>
				<p>Tags: 
			@foreach($post->tags()->get() as $tag)
				<a href="{{ URL::to('tags/'.$tag->name) }}" title="{{$tag->name}}" alt="{{$tag->name}}">{{ $tag->name }}</a>,  
			@endforeach<br />
				Posted in 
					@foreach($post->categories as $categorie)
						<a href='categories/{{$categorie->name}}'>{{ $categorie->name }}</a> 
					@endforeach
			</div>

			
		</div>

</div>

@stop