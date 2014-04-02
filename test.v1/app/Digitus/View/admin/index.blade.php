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
		<div class="panel-heading"><h2>Users<a type="button" class="btn btn-sm btn-success pull-right" href="{{{URL::route('admin.users.create')}}}"><span class="glyphicon glyphicon-plus"></span> Add new user</a></h2>  </div>
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
				<tr>
					<td></td>
					<td>{{ $user->id }}</td>
					<td>{{ $user->username }}</td>
					<td>{{ $user->first_name }}</td>
					<td>{{ $user->last_name }}</td>
					<td>{{ $user->email }}</td>
					<td></td>
					<td><a id="" type="button" class="btn btn-primary btn-xs form-control-feedback" href="{{{URL::route('this.user.edit', [$user->username])}}}">
			<span class="glyphicon glyphicon-cog"></span> 
		</a><button type="button" class="btn btn-warning btn-xs form-control-feedback col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
			<span class="glyphicon glyphicon-trash"></span> 
		</button><button type="button" class="btn btn-danger btn-xs form-control-feedback col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
			<span class="glyphicon glyphicon-remove"></span> 
		</button></td>
					</tr>
				
			</table>
		</div>
	</div>

</div>
			
@stop