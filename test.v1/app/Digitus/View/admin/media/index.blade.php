@extends('layouts.back.admin')

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
<div class="col-10">
<div class="panel panel-danger">
	<div class="panel-body"><a href="{{{URL::route('admin.media.create') }}}" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add new image</a></div>
</div>
	<table class="table table-bordered table-hover">
		<tr>
			<th>id</th>
			<th>title</th>
			<th>image</th>
			<th>URL to</th>
			<th>Edit image</th>
			<th>Delete image</th>
		</tr>
	
		@foreach($images as $image)
			<tr>
				<td>{{$image->id}}</td>
				<td>{{$image->title}}</td>
				<td><a href="{{URL::to($image->image) }}"><figure class="case-img-thumb" style="background-image: url({{ URL::to($image->image) }}" title="{{$image->title}}"></figure></a></td>
				<td>{{ URL::to($image->image)}}</td>
				<td><a href="{{ URL::route('admin.media.edit',[$image->id]) }}" class="btn btn-primary">Edit</a></td>
				
				<td> {{ Form::open(array('method'=>'DELETE','action'=>array('admin.media.destroy',$image->id)))}}
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