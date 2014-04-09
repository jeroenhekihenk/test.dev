@extends('layouts.back.admin')

@section('menu')
	@include('layouts.front.menus.digimenu')
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
	{{ Form::hidden('author', $loggedUser->id) }}

	<p>{{ Form::label('title', 'Post Title') }}</p>
	{{ $errors->first('title') }}
	<p>{{ Form::text('title', Input::old('title'), array('class'=>'form-control')) }}</p>

	<p>{{ Form::label('slug', 'Slug') }}</p>
	{{ $errors->first('slug') }}
	<p><label class="small">{{ URL::to('/blog') }}/</label> {{ Form::text('slug', Input::old('slug'), array('class'=>'form-control')) }}</p>

	<p>{{ Form::label('body', 'Post Body') }}</p>
	{{ $errors->first('body') }}
	<p>{{ Form::text('body', Input::old('body'), array('class'=>'form-control')) }}</p>


	
	

	<p>{{ Form::submit('Create', array('class'=>'btn btn-success')) }}</p>
	{{ Form::close() }}
</div>
@stop