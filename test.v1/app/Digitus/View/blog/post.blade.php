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
			<h1>{{ $post->post_title }}  </h1>
			<p class="postinfo">Geplaatst op {{ $post->getUpdatedAt() }} door <a href="{{{ URL::to('users/'.$user->username) }}}" target="_blank">{{ $author }}</a>
			</p>
			<p>{{ $post->image }}</p>
			<p>{{ $post->post_body }}</p>
			<hr>
			<div class="blogbottom">
				<p class="pull-left">Tags: 
			@foreach($post->tags()->get() as $tag)
				<a href="{{ URL::to('tags/'.$tag->name) }}" title="{{$tag->name}}" alt="{{$tag->name}}">{{ $tag->name }}</a>,  
			@endforeach<br />
				Posted in 
					@foreach($post->categories as $categorie)
						<a href='categories/{{$categorie->name}}'>{{ $categorie->name }}</a> 
					@endforeach
				</p>
				<p class="pull-right">
					{{ Form::open(array('method'=>'DELETE','class'=>'pull-right','action'=>array('admin.blog.destroy', $post->post_slug))) }}
					{{ Form::submit('Delete this post', array('class'=>'btn btn-danger btn-xs'))}}
					{{ Form::close() }}
				</p>
				<p class="pull-right">
					<a href="{{{ URL::route('admin.blog.edit', [$post->post_slug]) }}}" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-cog"></span> Edit this post</a>
				</p>
				<p class="pull-right">
					<a href="{{{ URL::route('admin.tag.create') }}}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-tag"></span> Add tag</a>
				</p>
				<p class="pull-right">
					<a href="{{{ URL::route('admin.categorie.create') }}}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-tag"></span> Add Categorie</a>
				</p>
			</div>

			
		</div>

		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 pull-left col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-offset-1 panel panel-info">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 pull-left">
				<img class="profile-pic" src="{{{ URL::to($user->image) }}}"></img>
				<h3>{{$author}}</h3>
			</div>
			<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 pull-right">
				<p>{{$user->description}}</p>
			</div>
		</div>

		@foreach($post->comments as $comment)
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 pull-left col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-offset-1 panel panel-warning">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 pull-left">
				<a href="{{URL::to($comment->website)}}" target="_blank"><h3>{{$comment->naam}}</h3></a>
				<p class="pull-right">Geplaatst op: {{ $comment->created_at }}</p>
			</div>
			<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 pull-right">
				<p>{{$comment->bericht}}</p>
			</div>
		</div>
		@endforeach

		
</div>

@stop

@section('comments')
	@include('comments.form')
@stop