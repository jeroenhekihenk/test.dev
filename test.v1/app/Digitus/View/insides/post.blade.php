@extends('layouts.front.blogpost')

@section('title')
	{{ $post->title }}
@stop

@section('menu')
	@include('layouts.front.menus.digimenu')
@stop

@section('sidebar2')
<!-- Gerelateerde posts blok -->
	<div id="sidebar" class="sidebar2">
		@include('layouts.front.menus.blog.related')
	</div>
<!-- /Gerelateerde posts blok -->
@stop

@section('content')

<div class="blogroll col-xs-8 col-sm-8 col-md-8 col-lg-8">

		<!-- Blogpost blok -->

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 pull-left panel panel-info post post-{{$post->id}}">
			
			
			<div class="post-top">
				@if($loggedUser)
					<div class="">
						{{ Form::open(array('method'=>'DELETE','class'=>'pull-right','action'=>array('admin.insides.destroy', $post->slug))) }}
						{{ Form::submit('&times;', array('class'=>'btn btn-danger btn-xs'))}}
						{{ Form::close() }}
					
				 
						<a href="{{{ URL::route('admin.insides.edit', [$post->slug]) }}}" class="btn btn-warning btn-sm pull-right" style="margin-right: 10px;"><span class="glyphicon glyphicon-cog"></span></a>
					</div>
				@endif
				<div class="post-info">
					<p class="post-date">Geplaatst op <span class="date">{{ $post->getUpdatedAt() }}</span></p>
					<p class="post-author">door <a class="post-author" href="{{{ URL::to('user/'.$user->username) }}}" target="_blank">{{ $author }}</a></p>
					<p class="post-categorie">in 
						@foreach($post->categories as $categorie)
							<a href='/categories/{{$categorie->name}}'>{{ $categorie->name }}</a> 
						@endforeach
					</p>
				</div>
				<div style="clear:both"></div>
			</div>
			<div class="post-body">
				<img class="post-image col-xs-6 col-sm-6 col-md-6 col-lg-6" src='{{{ URL::to($post->image) }}}'></img>
				<h2 class="post-title">{{ $post->title }}</h2>
				<p>{{ $post->body }}</p>
			</div>
			<div style="clear:both"></div>
			<hr>
			<div class="post-bottom">
				<div class="post-info">
					<p class="post-date">Geplaatst op <span class="date">{{ $post->getUpdatedAt() }}</span></p>
					<p class="post-author">door <a class="post-author" href="{{{ URL::to('user/'.$user->username) }}}" target="_blank">{{ $author }}</a></p>
					<p class="post-categorie">in 
						@foreach($post->categories as $categorie)
							<a href='{{ URL::to('/categories/'.$categorie->name) }}'>{{ $categorie->name }}</a> 
						@endforeach
					</p>
					<p class="post-tags">
						Tags:
						@foreach($post->tags as $tag)
							<a href="{{ URL::to('/tags/'.$tag->name) }}" title="{{$tag->name}}" alt="{{$tag->name}}">{{ $tag->name }}</a>,  
						@endforeach
					</p>
				</div>
				<div style="clear:both"></div>
				

			</div>
				
				<div style="clear:both"></div>
		</div><!-- /Blogpost blok -->

		<!-- Auteur blok -->

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 panel panel-info">
			<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 pull-left">
				<figure class="profile-pic" style="background-image: url('{{{ URL::to($user->image) }}}');"></figure>
				<h3>{{$author}}</h3>
			</div>
			<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 pull-right">
				<p>{{$user->description}}</p>
			</div>
		</div> <!-- /Auteur blok -->



		<!-- Comments blok -->

		@foreach($post->comments as $comment)
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1 pull-left panel panel-warning comment-{{$comment->id}}">
			@if($loggedUser)
			
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
<div class="nieuw-comment col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-1 col-sm-offset-1 col-md-offset-1 col-lg-offset-1">
	<h3>Plaats een reactie:</h3>
	@include('comments.form')
</div><!-- /Nieuwe comment blok -->
	
</div><!-- /Blogrol.container -->

@stop

