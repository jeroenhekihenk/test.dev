@extends('layouts.main')

@section('content')

<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-info">
		<div class="panel-heading">PLease Login</div>
		<div class="panel-body">
			{{ Form::open(array('action' => 'post.login')) }}
			@if($errors->has('login'))
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					{{ $errors->first('login', ':message') }}
				</div>
			@endif
			<div class="form-group">
				{{ Form::label('email', 'Email Address') }}
				{{ Form::text('email', '', array('class'=>'form-control','placeholder'=>'Please enter your Email Address to login', 'autofocus')) }}
			</div>
			<div class="form-group">
				{{ Form::label('password', 'Password') }}
				{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
			</div>
			<div class="form-group">
				{{ Form::submit('Login', array('class'=>'btn btn-success')) }}
				{{ HTML::link('/', 'Cancel', array('class'=>'btn btn-danger')) }}
			</div>
			<hr>
			<div class="form-group">
				<h2>Don't have an account?</h2>
				{{ HTML::link('register', 'Please register here', array('class'=>'btn btn-primary btn-xs'))}}
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

@stop