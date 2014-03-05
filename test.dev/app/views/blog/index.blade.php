@extends('layouts.main')

@section('title')
Blog
@stop

@section('menu')
	@include('layouts.menus.homemenu')
@stop

@section('sidebar')
@stop

@section('content')

<style>
.blogroll{
	margin-top: 80px;
}
</style>

<div class="blogroll">

	<ul class="nav col-xs-1 col-sm-1 col-md-1 col-lg-1">
		<li><a href="{{{ URL::to('blog/create') }}}" class="btn btn-success btn-xs pull-left"><span class="glyphicon glyphicon-plus"></span> New post</a></li>
	</ul>

	@foreach($posts as $post)
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
			<h1>{{ $post->post_title }}</h1>
			<p>{{ $post->post_body }}</p>
			<span class="label">Posted on {{ $post->updated_at }}</span>
				<span class="label">By: <a href="{{{ URL::to('users/'.$post->post_author) }}}" target="_blank">{{ $post->post_author }}</a></span>
				<div class="panel">Tags: @foreach($users as $user)
					<p class="label label-warning">{{ $user->username }}</p> @endforeach</div>
				@if(Sentry::check())
				{{ Form::open(array('url'=>'blog/post/'.$post->id), 'DELETE') }}
				<p>{{ Form::submit('Delete', array('class'=>'btn-small')) }}</p>
				{{ Form::close() }}
			@endif
			<hr>
		</div>
	@endforeach

</div>

@stop

@section('pagination')
	<div class="row">
		<div class="span8">
			{{ $posts -> links(); }}
		</div>
	</div>
@stop