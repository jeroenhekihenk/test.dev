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
		<div class="panel panel-info">
			<div class="panel-heading"><h3>{{ $user->username }}</h3></div>
		</div>
	</div>
@stop

@section('footer')
@stop