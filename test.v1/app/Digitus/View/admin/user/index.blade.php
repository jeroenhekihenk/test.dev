@extends('layouts.back.admin')

@section('bodyid')
@stop

@section('notification')
@stop

@section('menu')
	@include('layouts.back.menus.homemenu')
@stop

@section('sidebar')
	@include ('layouts.back.menus.adminmenu')
@stop

@section('content')
@if($loggedUser->roles->first()->name === 'Admin')
<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
<div class="panel panel-danger">
	<div class="panel-body"><a href="{{{URL::route('admin.users.create') }}}" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add new user</a></div>
</div>
	<table class="table table-bordered table-hover">
		<tr>
			<th></th>
			<th>id</th>
			<th>username</th>
			<th>Firstname</th>
			<th>Lastname</th>
			<th>Email</th>
			<th>Group</th>
			<th>Edit or Delete user</th>
		</tr>
	
		@foreach($users as $user)
			<tr>
				<td><figure class="profile-pic-thumb" style="background-image: url('{{{ URL::to($user->image) }}}');"></figure></td>
				<td>{{$user->id}}</td>
				<td>{{$user->username}}</td>
				<td>{{$user->firstname}}</td>
				<td>{{$user->lastname}}</td>
				<td>{{$user->email}}</td>
				<td>
					@foreach($user->roles()->get() as $role)
						{{$role->name}}
					@endforeach
				</td>
				<td><a href="{{ URL::route('admin.users.edit',[$user->username]) }}" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-plus"></span></a>{{ Form::open(array('method'=>'DELETE','class'=>'pull-right','action'=>array('admin.users.destroy',$user->username)))}}
					{{ Form::submit('Destroy', array('class'=>'btn btn-danger'))}}
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</table>
</div>
@endif
@stop

@section('footer')
@stop