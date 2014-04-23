@extends('layouts.front.blogpost')

@section('title')
	{{ $post->title }}
@stop

@section('menu')
	@include('layouts.front.menus.digimenu')
@stop

@section('sidebar2')
<!-- Gerelateerde posts blok -->
<div class="aside-block col-3">
	<div id="sidebar">
		<div class="sidebar2 col-12">
			@include('layouts.front.menus.blog.related')
		</div>
	</div>
</div>
<!-- /Gerelateerde posts blok -->
@stop

@section('content')

<div class="blogroll col-9">

		<!-- Blogpost blok -->

		<div class="col-12 pull-left post post-{{$post->id}}">
			
			<h2 class="post-title">{{ $post->title }}</h2>
			<div style="clear:both"></div>
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
							<a href='{{ URL::route('categories.show',$categorie->name) }}'>{{ $categorie->name }}</a> 
						@endforeach
					</p>
				</div>
				<div style="clear:both"></div>
			</div>
			<div class="post-body">
				<img class="post-image col-6" src='{{{ URL::to($post->image) }}}'></img>
				
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
							<a href='{{ URL::route('categories.show',$categorie->name) }}'>{{ $categorie->name }}</a> 
						@endforeach
					</p>
					<p class="post-tags">
						Tags:
						@foreach($post->tags as $tag)
							<a href="{{ URL::route('tags.show',$tag->name) }}" title="{{$tag->name}}" alt="{{$tag->name}}">{{ $tag->name }}</a>,  
						@endforeach
					</p>
				</div>
				<div style="clear:both"></div>
				

			</div>
				
				<div style="clear:both"></div>
		</div><!-- /Blogpost blok -->

		<!-- Auteur blok -->

		<div class="feed col-12">
			<div class="col-12 post-author">
				<div class="col-4 pull-left author-details">
					<figure class="profile-pic" style="background-image: url('{{{ URL::to($user->image) }}}');"></figure>
					<h3>{{$author}}</h3>
					<div class="social">
						<ul class="social-icons">
							<li><a href="{{ URL::to($user->facebook) }}" class="fb" target="_blank"><span class="social">Facebook</span></a></li>
							<li><a href="{{ URL::to($user->twitter) }}" class="twt" target="_blank"><span class="social">Twitter</span></a></li>
							<li><a href="{{ URL::to($user->google) }}" class="gplus" target="_blank"><span class="social">Google +</span></a></li>
							<li><a href="{{ URL::to($user->linkedin) }}" class="lin" target="_blank"><span class="social">LinkedIn</span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-8 pull-right author-about">
					<h3>Over {{$author}}</h3>
					<p>{{$user->description}}</p>
				</div>
			</div>
		</div> <!-- /Auteur blok -->



		<!-- Comments blok -->

		<div id="disqus_thread"></div>
		<script type="text/javascript">
		/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
		var disqus_shortname = 'digitusmarketingnl'; // required: replace example with your forum shortname
		var disqus_identifier = '{{ $post->slug }}';
		var disqus_title = '{{ $post->title }}';
		var disqus_url = '{{ URL::route('insides.show',$post->slug) }}';

		/* * * DON'T EDIT BELOW THIS LINE * * */
		(function() {
			var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
			dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
			(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
		})();
		</script>
		<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
		<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
    

		<!-- /Comments blok -->


	
</div><!-- /Blogrol.container -->
    <script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'digitusmarketingnl'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
    </script>
    
@stop

@section('footer')
	@include('layouts.front.footer.main')
@stop