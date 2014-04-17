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
	<div class="panel-body"><a href="{{{URL::route('admin.cases.create') }}}" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add new case</a></div>
</div>
	<table class="table table-bordered table-hover">
		<tr>
			<th>id</th>
			<th>klant</th>
			<th>title</th>
			<th>body</th>
			<th>image</th>
			<th>Edit case</th>
			<th>View case</th>
			<th>Delete case</th>
		</tr>
	
		@foreach($cases as $case)
			<tr>
				<td>{{$case->id}}</td>
				<td>{{$case->klant}}</td>
				<td>{{$case->title}}</td>
				<td>{{$case->body}}</td>
				<td><figure style="background-image: url('{{URL::to($case->image) }}')" class="case-img-thumb"></figure></td>
				<td><a href="{{ URL::route('admin.cases.edit',[$case->slug]) }}" class="btn btn-primary">Edit</a></td>
				<td><a href="{{ URL::route('cases.show',[$case->slug]) }}" class="btn btn-info">View</a></td>
				<td> {{ Form::open(array('method'=>'DELETE','action'=>array('admin.cases.destroy',$case->slug)))}}
					{{ Form::submit('Destroy', array('class'=>'btn btn-danger'))}}
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</table>
</div>
@endif
@stop