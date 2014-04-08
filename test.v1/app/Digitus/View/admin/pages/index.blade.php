@extends('layouts.back.main')

@section('bodyid')
@stop

@section('menu')
@stop

@section('notification')
@stop

@section('sidebar')
	@include('layouts.back.menus.adminmenu')
@stop

@section('content')

<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
<div class="panel panel-danger">
	<div class="panel-body"><a href="{{{URL::route('admin.pages.create') }}}" class="btn btn-sm btn-success pull-right"><span class="glyphicon glyphicon-plus"></span> Add new page</a></div>
</div>
	<table class="table table-bordered table-hover">
		<tr>
			<th>id</th>
			<th>author</th>
			<th>title</th>
			<th>body</th>
			<th>slug</th>
			<th>Edit page</th>
			<th>View page</th>
			<th>Delete page</th>
		</tr>
	
		@foreach($pages as $page)
			<tr>
				<td>{{$page->id}}</td>
				<td>{{$page->getAuthorUsername()}}</td>
				<td>{{$page->title}}</td>
				<td>{{$page->body}}</td>
				<td>{{$page->slug}}</td>
				<td><a href="{{ URL::route('admin.pages.edit',[$page->slug]) }}">Edit</a></td>
				<td><a href="{{ URL::route('admin.pages.show',[$page->slug]) }}">View</a></td>
				<td> {{ Form::open(array('method'=>'DESTROY','action'=>array('admin.pages.destroy',$page->slug)))}}
					{{ Form::submit('Destroy', array('class'=>'btn btn-danger'))}}
					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</table>
</div>
@stop

@section('footer')
@stop