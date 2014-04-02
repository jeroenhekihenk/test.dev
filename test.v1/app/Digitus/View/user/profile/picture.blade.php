@extends('layouts.userprofile')

@section('title')
	{{$loggedUser->username}}'s Profile
@stop

@section('notification')
@stop

@section('menu')
	@include('layouts.menus.homemenu')
@stop

@section('sidebar')
	@include('layouts.menus.profilemenu')
@stop

@section('content')

	<div class="col-sm-10 col-md-10 col-xs-10 col-lg-10">
		{{ Form::open(array('method'=>'POST','files' => true)) }}
		{{ Form::file('file') }}
		{{ Form::submit('Save', array('class'=>'btn btn-success')) }}
		{{ Form::close() }}
	</div>

@stop

@section('footer')
@stop