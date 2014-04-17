@extends('layouts.back.admin')

@section('title')
@stop

@section('menu')
	@include('layouts.back.menus.homemenu')
@stop

@section('sidebar')
	@include('layouts.back.menus.adminmenu')
@stop

@section('notification')
@if($loggedUser->roles->first()->name === 'Admin')
<div id="notification" class="notification notification-sidebar">
	<a href="{{URL::route('admin.insides.create')}}" class="btn btn-success btn-md"><span class="glyphicon glyphicon-plus"></span> Nieuwe blogpost</a>
</div>
@endif
@stop

@section('content')
@if($loggedUser->roles->first()->name === 'Admin')
<div class="col-9">
	
	<div class="panel panel-info">
		<div class="panel-heading"><h2>Blogpost overview</h2></div>
		<div class="panel-body">
			<table class="table table-hover table-bordered">
				<tr>
					<th>Id</th>
					<th>Author</th>
					<th>Title</th>
					<th>Body text</th>
					<th>Tags</th>
					<th>Categorie</th>
					<th>Edit, Delete</th>
					<th>View post</th>
				</tr>
				@foreach($posts as $post)
				<tr>
					<td>{{ $post->id }}</td>
					<td>{{ $post->getAuthorUsername() }}</td>
					<td>{{ $post->title }}</td>
					<td>{{ $post->body }}</td>
					<td>
						@foreach($post->tags as $tag) {{ $tag->name }}, @endforeach
					</td>
					<td>
						@foreach($post->categories as $categorie) {{$categorie->name}}, @endforeach
					</td>
					<td>
						<a href="{{URL::route('admin.insides.edit',$post->slug) }}" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-cog"></span> Edit</a> 
					</td>
					<td><a href="{{URL::route('insides.show',$post->slug) }}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open"></span> Kijk</a>
				</tr>
				@endforeach
			</table>

		</div>
	</div>
</div>
@endif
@stop

@section('footer')
@stop