<div class="related-posts">
	<p>Gerelateerde berichten: </p>
		
	@foreach($posts as $post)
		<?php if(!$post->id) continue; ?>
			<div class="post-related">
				<figure class="post-pic" style="background-image: url('{{{ URL::to($post->image) }}}');"></figure>
				<a href="{{URL::to('insides/'.$post->slug)}}">
					<h4>{{$post->title}}</h4>
				</a>
				<a href="{{URL::to('insides/'.$post->slug)}}" title="{{$post->title}}" class="btn btn-xs btn-info">Lees verder</a>
			</div>   
	@endforeach
		
</div>