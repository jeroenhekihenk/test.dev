@extends('layouts.userprofile')

@section('title')
	{{$user->username}}'s Profile
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
			<div class="panel-heading"><h3>{{ $user->username }}<a type="button" href="{{{URL::route('this.user.edit', [$user->username])}}}" class="btn btn-md btn-success pull-right"><span class="glyphicon glyphicon-cog"></span> Edit</a></h3> </div>
			<div class="panel-body">
				<table>
					<tr>
						<td>Username:</td>
						<td>{{$user->username}}</td>
					</tr>
					<tr>
						<td>Firstname:</td>
						<td>{{$user->firstname}}</td>
					</tr>
					<tr>
						<td>Lastname:</td>
						<td>{{$user->lastname}}</td>
					</tr>
					<tr>
						<td>Email:</td>
						<td>{{$user->email}}</td>
					</tr>
					<tr>
						<td>Description:</td>
						<td>{{$user->description}}</td>
					</tr>
					<tr>
						<td>Profile Image:</td>
						<td><a href="{{{ URL::to('user/'.$user->username.'/picture') }}}"><img src='{{{ URL::to($user->image) }}}' class="profile-pic"></a></td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="col-sm-10 col-md-10 col-xs-10 col-lg-10 col-xs-offset-2 col-md-offset-2 col-sm-offset-2 col-lg-offset-2">
		<div class="panel panel-info">
			<div class="panel-heading"><h3>Social Media<a type="button" href="" class="btn btn-md btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add</a></h3> </div>
			<div class="panel-body">
				<table>
					<tr>
						<td>Facebook:</td>
						<td>{{$user->facebook}}</td>
					</tr>
					<tr>
						<td>Twitter:</td>
						<td>{{$user->twitter}}</td>
					</tr>
					<tr>
						<td>LinkedIn:</td>
						<td>{{$user->linkedin}}</td>
					</tr>
					<tr>
						<td>YouTube:</td>
						<td>{{$user->youtube}}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
@stop

@section('footer')
@stop