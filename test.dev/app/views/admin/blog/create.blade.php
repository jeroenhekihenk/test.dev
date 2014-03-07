@extends('layouts.blog')

@section('content')
<div class="span8">
	<h2>Create new post</h2>
	<hr>
	{{ Form::open(array('url'=>'blog/create')) }}
	{{ Form::hidden('post_author', $user->username) }}

	<p>{{ Form::label('post_title', 'Post Title') }}</p>
	{{ $errors->first('post_title') }}
	<p>{{ Form::text('post_title', Input::old('post_title')) }}</p>

	<p>{{ Form::label('post_body', 'Post Body') }}</p>
	{{ $errors->first('post_body') }}
	<p>{{ Form::text('post_body', Input::old('post_body')) }}</p>

	<p>{{ Form::submit('Create') }}</p>
	{{ Form::close() }}
</div>
@stop