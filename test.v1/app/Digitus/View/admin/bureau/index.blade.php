@extends('layouts.back.admin')

@section('menu')
	@include('layouts.back.menus.homemenu')
@stop

@section('sidebar')
	@include ('layouts.back.menus.adminmenu')
@stop

@section('content')
@if($loggedUser->roles->first()->name === 'Admin')
<div class="col-9">
<div class="panel panel-danger">
	<div class="panel-body"><a href="{{{URL::route('admin.bureau.create') }}}" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add new ding</a></div>
</div>
	<table class="table table-bordered table-hover">
		<tr>
			<th>id</th>
			<th>titel</th>
			<th>body</th>
			<th>subbody</th>
			<th>link</th>
			<th>Edit</th>
			<th>View</th>
			<th>Delete</th>
		</tr>
	
		@foreach($blokken as $blok)
			<tr>
				<td>{{$blok->id}}</td>
				<td>{{$blok->title}}</td>
				<td>{{$blok->body}}</td>
				<td>{{$blok->subbody}}</td>
				<td>{{$blok->link}}</td>
				<td><a href="{{ URL::route('admin.bureau.edit',[$blok->id]) }}" class="btn btn-primary">Edit</a></td>
				<td><a href="{{ URL::route('bureau.index') }}" class="btn btn-info">View</a></td>
				<td> {{ Form::open(array('method'=>'DELETE','action'=>array('admin.bureau.destroy',$blok->id)))}}
					{{ Form::submit('Destroy', array('class'=>'btn btn-danger'))}}
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</table>
</div>
@endif
@stop