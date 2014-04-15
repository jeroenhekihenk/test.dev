<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2 panel panel-info">
	<p>Gerelateerde berichten: </p>
		

@foreach($posts as $post)
<?php if(!$post->id) continue; ?>
<div class="post-related">
	<figure class="post-pic" style="background-image: url('{{{ URL::to($post->image) }}}');"></figure>
	<a href="{{URL::to('insides/'.$post->slug)}}"><h4>{{$post->title}}</h4></a>
	<p>{{$post->body}}</p>
</div>
       
@endforeach
		

</div>