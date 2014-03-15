@extends('layouts.blog')

@section('title')
Blog
@stop

@section('menu')
	@include('layouts.menus.homemenu')
@stop

@section('sidebar')
<div id="sidebar" class="sidebar col-sm-2 col-md-2">
	<!-- @if($loggedUser->hasAccess('blogpost.add'))
	 <ul class="nav nav-sidebar nav-pills nav-stacked">
		<li><a href="{{{ URL::to('admin/blog/create') }}}" class="btn btn-success btn-xs pull-left"><span class="glyphicon glyphicon-plus"></span> New post</a></li>
	</ul>
	@endif -->
</div>
@stop

@section('content')

<div class="blogroll container col-sm-offset-2 col-md-offset-2 col-xs-offset-2 col-lg-offset-2">


		<div class="panel">
			<div class="panel panel-info">
				<div class="panel-heading">{{$categorie->name}}</div>
			</div>
			<div class="panel-body">
				<h1>Related posts</h1>
				@foreach($categorie->posts as $post)
				<div class="panel panel-default">
					<div class="panel-heading"><h2>{{ $post->post_title }}</h2></div>
					<div class="panel-body"><p>{{ $post->post_body }}</p></div>
				</div>
				@endforeach
			</div>
		</div>



</div>

@stop

@section('pagination')
	<div class="row">
		<div class="span8">
			
		</div>
	</div>
@stop