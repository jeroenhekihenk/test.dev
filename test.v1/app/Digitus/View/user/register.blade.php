@extends('layouts.main')

@section('content')

<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-info">
        <div class="panel-heading">Please Register</div>
        <div class="panel-body">
            {{ Form::open(array('url' => 'register')) }}
            @if($errors->any())
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </div>
            @endif
            <div class="form-group">
                {{ Form::label('username', 'Username') }}
                {{ Form::text('username', '', array('class'=>'form-control','placeholder'=>'Username')) }}
            </div>
            <div class="form-group">
                {{ Form::label('firstname', 'First Name') }}
                {{ Form::text('firstname', '', array('class' => 'form-control', 'placeholder' => 'First Name')) }}
            </div>
            <div class="form-group">
                {{ Form::label('lastname', 'Last Name') }}
                {{ Form::text('lastname', '', array('class' => 'form-control', 'placeholder' => 'Last Name')) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email Address') }}
                {{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email Address')) }}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
            </div>
            <div class="form-group">
                {{ Form::label('password_confirmation', 'Password') }}
                {{ Form::password('password_confirmation', array('class' => 'form-control', 'placeholder' => 'Password Confirmation')) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Register', array('class' => 'btn btn-success')) }}
                {{ HTML::link('/', 'Cancel', array('class' => 'btn btn-danger')) }}
            </div>
            <hr>
            <div class="form-group">
                <h2>Already have an account?</h2>
                {{ HTML::link('login', 'Login here', array('class'=>'btn btn-primary btn-xs')) }}
            </div>
            {{ Form::close() }}
        </div>
      </div>
</div>


@stop