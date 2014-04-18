@extends('layouts.front.page')

@section('title')
Blog
@stop

@section('menu')
	@include('layouts.front.menus.digimenu')
@stop

@section('sidebar')

@stop

@section('content')
<div class="inner">
	<div class="feed">
		<div class="col-12">
			<div class="col-6 page-welcome">
				<h3 class="text-center page-heading">Wilt u graag meer weten over één of meedere diensten? Neem telefonisch contact met ons op via <a href="#">085 003 02 56</a> of stuur ons een <a href="#">mailtje</a>.<br />
				Algemene vragen kunt u ook altijd stellen op onze <a href="#">Facebook pagina</a></h3>
			</div>
		</div>
		<div style="clear:both"></div>
		<!-- header gedoe hier -->
		<div class="feed">
			<div class="b-roll">

				
			
				@foreach($posts as $post)
					<div class="blok blogpost post-id-{{$post->id}}">

						<a href="{{ URL::route('insides.show',$post->slug) }}" target="_blank" alt="{{$post->title}}" title="{{$post->title}}" class="title">
							<h2>{{ $post->title }}</h2>
						</a>
						<div class="post-top">
							<p class="post-date">Geplaatst op: <span class="date">{{ $post->getUpdatedAtDay() }}</span></p>
							<p class="post-author">	&nbsp;door: <a class="post-author" href="{{URL::route('this.user.show',$post->getAuthor()) }}">{{$post->getAuthor()}}</a></p>
						</div>
						<figure class="blogpostimg fluid" style="background-image: url('{{ URL::to(''.$post->image) }}'); "></figure>
						<p class="post-body">{{ $post->body }}</p>
						<hr>
						<div class="post-bottom">
<!-- 							<p class="post-tags">Tags: 
								@foreach($post->tags()->get() as $tag)
									<a href="{{ URL::route('tags.show',$tag->name) }}" title="{{$tag->name}}" alt="{{$tag->name}}">{{ $tag->name }}</a>,  
								@endforeach
							</p> -->
							<p class="post-categorie">Geplaatst in 
								@foreach($post->categories as $categorie)
									<a href="{{ URL::route('categories.show',$categorie->name) }}">{{ $categorie->name }}</a> 
								@endforeach
							</p>
							<p class="read-more"><a href="{{ URL::route('insides.show', $post->slug) }}" title="{{ $post->title}} verder lezen">Lees verder ></a>
							</p>
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
						</div><!-- /post-bottom -->
						
					</div><!-- /blok.blogpost -->
				@endforeach
			</div><!-- /b-roll -->
		</div><!-- /feed -->
		<div class="prev"></div>
		<div class="next"></div>
	</div><!-- /feed -->
</div><!-- /inner -->

@stop

@section('footer')
	@include('layouts.front.footer.main')
@stop