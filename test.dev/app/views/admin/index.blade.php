@extends('layouts.main')

@section('title')
	
@stop

@section('notification')
	

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
		@if($loggedUser)	
			<table class="table table-hover">
				<tr>
					<td>ID:</td>
					<td>Name:</td>
				</tr>
			</table>
		@endif

		@if($user)
			Laat dit maar zien dan, je bent waardeloos..
		@endif

		</div>
	</div>

	<div class="panel panel-info">
		<div class="panel-heading"><h2>Users<button type="button" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add user</button></h2>  </div>
		<div class="panel-body">
			<table class="table table-hover table-bordered table-striped">
				<tr>
					<th></th>
					<th>ID</th>
					<th>Username</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email Address</th>
					<th>In Group</th>
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
						<td>
							@foreach($user->groups()->get() as $group)
							{{ $group->name }}
							@endforeach
						</td>
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