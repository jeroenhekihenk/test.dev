@extends('layouts.back.admin')

@section('title')
@stop

@section('menu')
@stop

@section('sidebar')
	<a href="{{URL::route('admin.blog.create')}}" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus"></span></a>
@stop

@section('content')
	
	<div class="panel panel-info">
		<div class="panel-heading"><h2>Blogpost overview</h2></div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<tr>
					<th>ID</th>
					<th>author</th>
					<th>Title</th>
					<th>Body text</th>
					<th>Tags</th>
					<th>Categorie</th>
				</tr>
				@foreach($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->getAuthorUsername() }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->body }}</td>
					<td>
						@foreach($post->tags as $tag) {{ $tag->name }} @endforeach
					</td>
					<td>
						@foreach($post->categories as $categorie) {{$categorie->name}} @endforeach
					</td>
				</tr>
				@endforeach
			</table>

		</div>
	</div>

@stop

@section('footer')
@stop