@extends('layouts.main')

@section('title')
	
@stop

@section('notification')
<?php
	$userGroups = $user->groups()->lists('name');
?>	
<div id="notification" class="notification notification-success">
	<p><span class="glyphicon glyphicon-warning-sign"></span> 
	Je bent een @foreach($userGroups as $usergroup){{ $usergroup }} @endforeach</p>
</div>
@stop

@section('menu')
	@include('layouts.menus.homemenu')
@stop

@section('sidebar')
	@include('layouts.menus.adminmenu')
@stop

@section('content')
<div class="container col-sm-offset-2 col-md-offset-2 col-xs-offset-2 col-lg-offset-2">
	<div class="panel panel-info">
		<div class="panel-heading"><h2>Groups</h2></div>
		<div class="panel-body">
		@if($user->inGroup($SuperAdmin))	
			<table class="table table-hover">
				<tr>
					<td>ID:</td>
					<td>Name:</td>
				</tr>
				<tr>
					<td>{{ $SuperAdmin->id }}</td>
					<td>{{ $SuperAdmin->name }}</td>
					@foreach($SuperAdmin->permissions as $permission)
					<td>{{ $permission }}</td>
					@endforeach
				</tr>
				<tr>
					<td>Permissions</td>
					@foreach(Sentry::getUser()->permissions as $permission)
					<td>
						{{ $permission }}
					</td>
					@endforeach
				</tr>
			</table>
		@endif
		@if($user->inGroup($Admin))
			@foreach($Groups as $group)
				{{ $group }}
			@endforeach
			@foreach($users as $user)
				{{$user->id}}{{$user->username}}
			@endforeach
		@endif

		@if($user->inGroup($Member))
			Laat dit maar zien dan, je bent waardeloos..
		@endif

		</div>
	</div>

	<div class="panel panel-info">
		<div class="panel-heading"><h2>Users</h2></div>
		<div class="panel-body">
			<table class="table table-hover table-bordered table-striped">
				<tr>
					<th></th>
					<th>ID</th>
					<th>Username</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email Address</th>
					<th>Edit, Remove, Ban</th>
				</tr>
				@foreach($users as $user)
					<tr>
						<td style="padding-left: 12px;padding-top: 10px;width: 40px;"><span class="glyphicon glyphicon-user" style="margin:0 auto;"></span></td>
						<td>{{ $user->id }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->first_name }}</td>
						<td>{{ $user->last_name }}</td>
						<td>{{ $user->email }}</td>
						<td><button id="" type="button" class="btn btn-primary btn-xs form-control-feedback">
			<span class="glyphicon glyphicon-cog"></span> 
		</button><button type="button" class="btn btn-warning btn-xs form-control-feedback col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
			<span class="glyphicon glyphicon-trash"></span> 
		</button><button type="button" class="btn btn-danger btn-xs form-control-feedback col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
			<span class="glyphicon glyphicon-remove"></span> 
		</button></td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>

</div>
			
@stop