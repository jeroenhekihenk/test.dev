@extends('layouts.main')

@section('title')
	
@stop

@section('menu')
	@include('layouts.menus.homemenu')
@stop

@section('content')
<div class="container" style="margin-top:100px;">
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
				</tr>
			</table>
		@endif
		@if($user->inGroup($Admin))

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
						<td style="    padding-left: 12px;
    padding-top: 10px;
    width: 40px;"><span class="glyphicon glyphicon-user" style="margin:0 auto;"></span></td>
						<td>{{ $user->id }}</td>
						<td>{{ $user->username }}</td>
						<td>{{ $user->first_name }}</td>
						<td>{{ $user->last_name }}</td>
						<td>{{ $user->email }}</td>
						<td><button type="button" class="btn btn-primary btn-xs form-control-feedback">
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