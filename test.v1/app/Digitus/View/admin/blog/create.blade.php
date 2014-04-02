@extends('layouts.blog')

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
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
	<h2>Create new post</h2>
	<hr>
	{{ Form::open(array('action'=>'admin.blog.store','id'=>'newblogpost')) }}
	{{ Form::hidden('post_author', $loggedUser->id) }}

	<p>{{ Form::label('post_title', 'Post Title') }}</p>
	{{ $errors->first('post_title') }}
	<p>{{ Form::text('post_title', Input::old('post_title'), array('class'=>'form-control')) }}</p>

	<p>{{ Form::label('post_slug', 'Slug') }}</p>
	{{ $errors->first('post_slug') }}
	<p><label class="small">{{ URL::to('/blog') }}/</label> {{ Form::text('post_slug', Input::old('post_slug'), array('class'=>'form-control')) }}</p>

	<p>{{ Form::label('post_body', 'Post Body') }}</p>
	{{ $errors->first('post_body') }}
	<p>{{ Form::text('post_body', Input::old('post_body'), array('class'=>'form-control')) }}</p>
<!-- 	<p>{{ Form::label('tags', 'Tags') }}</p>
	{{ $errors->first('tags') }}
	<p>{{ Form::text('tags', Input::old('tags')) }}</p> -->

	<p>{{ Form::submit('Create', array('class'=>'btn btn-success')) }}</p>
	{{ Form::close() }}
</div>
@stop