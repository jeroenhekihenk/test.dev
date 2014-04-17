<div class="related-posts">
	<p>Gerelateerde berichten: </p>
		
	@foreach($berichten as $bericht)
		@if($post->id != $bericht->id)

			<div class="post-related">
				<figure class="post-pic" style="background-image: url('{{{ URL::to($bericht->image) }}}');"></figure>
				<a href="{{URL::route('insides.show',$bericht->slug)}}">
					<h4>{{$bericht->title}}</h4>
				</a>
				<a href="{{URL::route('insides.show',$bericht->slug)}}" title="{{$bericht->title}}" class="btn btn-xs btn-info">Lees verder</a>
			</div>  
		@endif 
	@endforeach
		
</div>

