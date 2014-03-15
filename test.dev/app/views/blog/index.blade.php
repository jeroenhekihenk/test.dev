@extends('layouts.blog')

@section('title')
Blog
@stop

@section('menu')
	@include('layouts.menus.homemenu')
@stop

@section('sidebar')
<div id="sidebar" class="sidebar col-sm-2 col-md-2">
	@if($loggedUser->hasAccess('blogpost.add'))
	<ul class="nav nav-sidebar nav-pills nav-stacked">
		<li><a href="{{{ URL::to('admin/blog/create') }}}" class="btn btn-success btn-xs pull-left"><span class="glyphicon glyphicon-plus"></span> New post</a></li>
	</ul>
	@endif
</div>
@stop

@section('content')

<div class="blogroll container col-sm-offset-2 col-md-offset-2 col-xs-offset-2 col-lg-offset-2">

	

	@foreach($posts as $post)
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 pull-left col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-offset-1 panel panel-info post-id-{{$post->id}}">

			<a href='{{ URL::to("blog/".$post->post_slug) }}' target="_blank" alt="{{$post->post_title}}" title="{{$post->post_title}}">
				<h1>{{ $post->post_title }}</h1>
			</a>
			<hr>
			<p class="postinfo">Geplaatst op {{ $post->getUpdatedAtDay() }} door <a href="{{{ URL::to('users/'.$post->post_author) }}}" target="_blank">{{ $post->post_author }}</a>
			</p>
			<p>{{ $post->post_body }}</p>
			<hr>
			<div class="blogbottom">
				<p>Tags: 
					@foreach($post->tags()->get() as $tag)
						<a href="{{ URL::to('tags/'.$tag->name) }}" title="{{$tag->name}}" alt="{{$tag->name}}">{{ $tag->name }}</a>,  
					@endforeach<br />
					Posted in 
						@foreach($post->categories as $categorie)
							<a href='categories/{{$categorie->name}}'>{{ $categorie->name }}</a> 
						@endforeach
					| {{ HTML::link('blog/'.$post->post_slug, 'leave a comment') }}
			</div>
			
		</div>
	@endforeach


</div>

@stop

@section('pagination')
	<div class="row">
		<div class="span8">
			{{ $posts->links() }}
		</div>
	</div>
@stop