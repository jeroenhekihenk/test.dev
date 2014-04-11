@extends('layouts.front.blogpost')

@section('title')
	{{ $post->title }}
@stop

@section('menu')
	@include('layouts.front.menus.digimenu')
@stop

@section('content')

<div class="blogroll col-xs-10 col-sm-10 col-md-10 col-lg-10">

		<!-- Blogpost blok -->

		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 pull-left panel panel-info post-{{$post->id}}">
			<h1>{{ $post->title }}  </h1>
			<p class="postinfo">Geplaatst op {{ $post->getUpdatedAt() }} door <a href="{{{ URL::to('user/'.$user->username) }}}" target="_blank">{{ $author }}</a>
			</p>
			<p>{{ $post->image }}</p>
			<p>{{ $post->body }}</p>
			<hr>
			<div class="blogbottom col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="pull-left col-xs-7 col-sm-7 col-md-7 col-lg-7">
					Tags: 
					@foreach($post->tags as $tag)
						<a href="{{ URL::to('tags/'.$tag->name) }}" title="{{$tag->name}}" alt="{{$tag->name}}">{{ $tag->name }}</a>,  
					@endforeach<br />
					Posted in 
					@foreach($post->categories as $categorie)
						<a href='categories/{{$categorie->name}}'>{{ $categorie->name }}</a> 
					@endforeach
				</div>
				@if($loggedUser->roles->first()->name === 'Admin')
					<div class="pull-right col-xs-5 col-sm-5 col-md-5 col-lg-5">
						{{ Form::open(array('method'=>'DELETE','class'=>'pull-right','action'=>array('admin.blog.destroy', $post->slug))) }}
						{{ Form::submit('Delete this post', array('class'=>'btn btn-danger btn-xs'))}}
						{{ Form::close() }}
					
				 
						<a href="{{{ URL::route('admin.blog.edit', [$post->slug]) }}}" class="btn btn-warning btn-sm pull-right" style="margin-right: 10px;"><span class="glyphicon glyphicon-cog"></span> Edit this post</a>
					</div>
				@endif
			</div>
		</div><!-- /Blogpost blok -->

		<!-- Auteur blok -->

		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 panel panel-info">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 pull-left">
				<figure class="profile-pic" style="background-image: url('{{{ URL::to($user->image) }}}');"></figure>
				<h3>{{$author}}</h3>
			</div>
			<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 pull-right">
				<p>{{$user->description}}</p>
			</div>
		</div> <!-- /Auteur blok -->

		<!-- Gerelateerde posts blok -->
		@include('layouts.front.menus.blog.related')
		<!-- /Gerelateerde posts blok -->

		<!-- Comments blok -->

		@foreach($post->comments as $comment)
		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 pull-left panel panel-warning comment-{{$comment->id}}">
			@if($loggedUser->roles->first()->name === 'Admin')
			
			<a href="{{ URL::route('comment.show',$comment->id) }}">Kijk</a>
			
			@endif
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 pull-left">
				<a href="{{URL::to($comment->website)}}" target="_blank"><h3>{{$comment->naam}}</h3></a>
				<p class="pull-right">Geplaatst op: {{ $comment->created_at }}</p>
			</div>
			<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 pull-right">
				<p>{{$comment->bericht}}</p>
			</div>
		</div>
		@endforeach

		<!-- /Comments blok -->


<!-- Nieuwe comment blok -->
<div class="nieuw-comment col-xs-8 col-sm-8 col-md-8 col-lg-8">
	<h3>Plaats een reactie:</h3>
	@include('comments.form')
</div><!-- /Nieuwe comment blok -->
	
</div><!-- /Blogrol.container -->

@stop

