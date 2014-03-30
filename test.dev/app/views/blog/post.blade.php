@extends('layouts.blog')

@section('title')
	{{ $post->post_title }}
@stop

@section('menu')
	@include('layouts.menus.homemenu')
@stop

@section('sidebar')
<div id="sidebar" class="sidebar col-sm-2 col-md-2">
	<ul class="nav nav-sidebar nav-pills nav-stacked">
		<li><a href="{{{ URL::to('admin/blog/create') }}}" class="btn btn-success btn-xs pull-left"><span class="glyphicon glyphicon-plus"></span> New post</a></li>
	</ul>
</div>
@stop

@section('content')

<div class="blogroll container col-sm-offset-2 col-md-offset-2 col-xs-offset-2 col-lg-offset-2">

	

		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 pull-left col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-offset-1 panel panel-info post-{{$post->id}}">
			<h1>{{ $post->post_title }}</h1>
			<p class="postinfo">Geplaatst op {{ $post->getUpdatedAt() }} door <a href="{{{ URL::to('users/'.$post->post_author) }}}" target="_blank">{{ $post->post_author }}</a>
			</p>
			<p>{{ $post->image }}</p>
			<p>{{ $post->post_body }}</p>
			<hr>
			<div class="blogbottom">
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