@extends('layouts.front.page')

@section('menu')
	@include('layouts.front.menus.digimenu')
@stop

@section('content')
	<div class="inner">
		<div class="feed">
			<div class="recensie-feed">
				<div class="feed">
					<div class="r-roll">
						@foreach($recensies as $recensie)
							<div class="blok recensie">
								<h3 class="text-center page-heading">{{$recensie->tekst}}<br /><br />
								<span class="klant">{{$recensie->klantnaam}}</span>, <a href="{{URL::to($recensie->klanturl) }}">{{$recensie->klantbedrijf}}</a></h3>
							</div>
						@endforeach
					</div>
					
				</div>
				<div class="prev-rec"></div>
				<div class="next-rec"></div>
			</div>
			<div style="clear:both"></div>
			<div class="feed">
				<div class="b-roll">
					@foreach($cases as $case)
						<div class="blok case case-{{$case->id}}">
							<a href="{{ URL::route('cases.show',$case->slug) }}" target="_blank" alt="{{$case->title}}" title="{{$case->title}}" class="title">
								<figure class="case-img" style="background-image: url({{ URL::to($case->image)}})">
									<div class="overlay">
										<h3>{{$case->klant}}</h3>
									</div>
								</figure>
								<h2>{{ $case->title }}</h2>
							</a>
						</div>
					@endforeach
				</div><!-- /c-roll -->
			</div><!-- /feed -->
			<div class="prev-c"></div>
			<div class="next-c"></div>
		</div><!-- /feed -->
	</div><!-- /inner -->
@stop

@section('footer')
	@include('layouts.front.footer.main')
@stop