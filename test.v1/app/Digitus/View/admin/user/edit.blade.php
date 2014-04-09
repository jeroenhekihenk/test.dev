@extends('layouts.back.admin')

@section('menu')
    @include('layouts.back.menus.homemenu')
@stop

@section('sidebar')
    @include('layouts.back.menus.adminmenu')
@stop

@section('content')
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">

    @if($errors->has('login'))
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            {{ $errors->first('login', ':message') }}
        </div>
    @endif
	{{Form::open(array('method'=>'PUT','action'=>array('admin.users.update', $user->username)))}}
    <div class="form-group">
        {{ Form::label('id', 'Id') }}
        {{ Form::text('id', $user->id, array('class'=>'form-control')) }}
    </div>
	<div class="form-group">
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username', $user->username, array('class'=>'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('firstname', 'First Name') }}
        {{ Form::text('firstname', $user->firstname, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('lastname', 'Last Name') }}
        {{ Form::text('lastname', $user->lastname, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email Address') }}
        {{ Form::email('email', $user->email, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('roles', 'Select role') }}
        {{ Form::select('roles', array('Admin'=>$role_admin, 'User'=>$role_user)) }}
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
</div>
@stop 