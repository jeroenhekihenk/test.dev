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
	<div class="panel-body"><a href="{{{URL::route('admin.workshops.create') }}}" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add new workshop</a></div>
</div>
	<table class="table table-bordered table-hover">
		<tr>
			<th>id</th>
			<th>title</th>
			<th>body</th>
			<th>image</th>
			<th>Edit case</th>
			<th>View case</th>
			<th>Delete case</th>
		</tr>
	
		@foreach($workshops as $workshop)
			<tr>
				<td>{{$workshop->id}}</td>
				<td>{{$workshop->title}}</td>
				<td>{{$workshop->body}}</td>
				<td><figure style="background-image: url('{{URL::to($workshop->image) }}')" class="case-img-thumb"></figure></td>
				<td><a href="{{ URL::route('admin.workshops.edit',[$workshop->slug]) }}" class="btn btn-primary">Edit</a></td>
				<td><a href="{{ URL::route('workshops.show',[$workshop->slug]) }}" class="btn btn-info">View</a></td>
				<td> {{ Form::open(array('method'=>'DELETE','action'=>array('admin.workshops.destroy',$workshop->slug)))}}
					{{ Form::submit('Destroy', array('class'=>'btn btn-danger'))}}
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</table>
</div>
@endif
@stop