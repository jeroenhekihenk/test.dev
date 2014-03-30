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

@foreach($posts as $post)	
	@foreach($post->categories as $categorie)
		<div class="panel panel-info">
			<div class="panel-heading"><a href="{{URL::to('categories/'.$categorie->name)}}" title="{{$categorie->name}}" alt="{{$categorie->name}}">{{$categorie->name}}</a></div>
			<div class="panel panel-body panel-warning">
				<div class="panel-heading">{{$post->post_title}}</div>
				<div class="panel-body">{{ $post->post_body}}</div>
			</div>
		</div>
	@endforeach
@endforeach


</div>

@stop

@section('pagination')
	<div class="row">
		<div class="span8">
			
		</div>
	</div>
@stop