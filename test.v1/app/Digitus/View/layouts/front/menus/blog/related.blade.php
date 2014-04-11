<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 panel panel-info">
	<p>Gerelateerde berichten: </p>
		

@foreach($posts as $post)
<?php if(!$post->id) continue; ?>
	{{$post->title}}
    
       
@endforeach
		

</div>