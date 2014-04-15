@extends('layouts.front.main')

@section('title')
Blog
@stop

@section('menu')

@stop

@section('sidebar')

@stop

@section('content')

<div class="blogroll container col-sm-offset-3 col-md-offset-3 col-xs-offset-3 col-lg-offset-3">

	

	@foreach($posts as $post)
		<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 pull-left panel panel-info post-id-{{$post->id}}">

			<a href="{{ URL::route('insides.show',$post->slug) }}" target="_blank" alt="{{$post->title}}" title="{{$post->title}}">
				<h1>{{ $post->title }}</h1>
			</a>
			<hr>

			<p class="postinfo">Geplaatst op {{ $post->getUpdatedAtDay() }} door <a href="{{ URL::route('this.user.show',$post->getAuthorUsername()) }}" target="_blank">{{ $post->getAuthor() }}</a>
			</p>
			<p>{{ $post->body }}</p>
			<hr>
			<div class="blogbottom">
				<p>Tags: 
					@foreach($post->tags()->get() as $tag)
						<a href="{{ URL::route('tags.show',$tag->name) }}" title="{{$tag->name}}" alt="{{$tag->name}}">{{ $tag->name }}</a>,  
					@endforeach<br />
					Posted in 
						@foreach($post->categories as $categorie)
							<a href="{{ URL::route('categories.show',$categorie->name) }}">{{ $categorie->name }}</a> 
						@endforeach
					| <a href="{{ URL::route('insides.show', $post->slug) }}" title="">leave a comment</a>
			</div>
			
		</div>
	@endforeach

	<div class="row">
		<div class="container">
			{{$posts->links()}}
		</div>
	</div>
</div>

@stop

@section('pagination')

@stop