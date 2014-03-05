@extends('layouts.main')

@section('title')
@stop

@section('menu')
@stop

@section('sidebar')
@stop

@section('content')
	
	<div class="panel panel-info">
		<div class="panel-heading"><h2>Blogpost overview</h2></div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Body text</th>
					<th></th>
				</tr>
				@foreach($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->post_title }}</td>
					<td>{{ $post->post_body }}</td>
					<td></td>
				</tr>
				@endforeach
			</table>
		
		</div>
	</div>

@stop

@section('footer')
@stop