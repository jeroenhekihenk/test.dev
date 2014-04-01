@extends('layouts.main')
@section('content')


    @if($errors->has('login'))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ $errors->first('login', ':message') }}
        </div>
    @endif
	{{Form::open(array('method'=>'PUT','action'=>array('this.user.update', $user->username)))}}
	<div class="form-group">
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username', $user->username, array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('first_name', 'First Name') }}
        {{ Form::text('first_name', $user->first_name, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', $user->last_name, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email Address') }}
        {{ Form::email('email', $user->email, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
    </div>
    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', $user->description, array('class'=>'form-control')) }}
    </div>
    {{Form::submit('Update', array('class'=>'btn btn-primary'))}}
    {{Form::close()}}

@stop 