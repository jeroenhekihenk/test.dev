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
			<div class="panel-heading"><h3>{{ $user->username }}</h3> <button type="button" class="btn btn-md btn-success">Edit</button></div>
			<div class="panel-body">
				<table>
					<tr>
						<td>Username:</td>
						<td>{{$user->username}}</td>
					</tr>
					<tr>
						<td>Firstname:</td>
						<td>{{$user->first_name}}</td>
					</tr>
					<tr>
						<td>Lastname:</td>
						<td>{{$user->last_name}}</td>
					</tr>
					<tr>
						<td>Email:</td>
						<td>{{$user->email}}</td>
					</tr>
					<tr>
						<td>Password:</td>
						<td>{{$user->password}}</td>
					</tr>
					<tr>
						<td>Description:</td>
						<td>{{$user->description}}</td>
					</tr>
					<tr>
						<td>Profile Image:</td>
						<td>{{$user->image}}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
@stop

@section('footer')
@stop