@extends('layouts.back.admin')

@section('content')

{{ Form::open(array('action'=>array('this.user.social.update',$user->username))) }}
<div class="form-group">
	{{ Form::label('facebook', 'Facebook') }}
	{{ Form::url('facebook', $user->facebook, array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('twitter', 'Twitter') }}
	{{ Form::url('twitter', $user->twitter, array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('linkedin', 'LinkedIn') }}
	{{ Form::url('linkedin', $user->linkedin, array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('google', 'Google+') }}
	{{ Form::url('google', $user->google, array('class'=>'form-control')) }}
</div>
{{ Form::submit('update', array('class'=>'btn btn-success')) }}
{{ Form::close() }}

@stop