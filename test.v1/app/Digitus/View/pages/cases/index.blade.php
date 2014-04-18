@extends('layouts.front.page')

@section('menu')
	@include('layouts.front.menus.digimenu')
@stop

@section('content')
	<div class="inner">
		<div class="feed">
			<div class="col-12">
				<div class="col-6 page-welcome">
					<h3 class="text-center page-heading">Een bedrijf is als een <span class="black">goed verhaal</span>: inspirerend, pakkend en meeslepend. Digitus zorgt ervoor dat jouw verhaal wordt vertelt. Dit met de juiste contentstrategie, ondersteund door gerichte social media marketing en slimme apps.</h3>
				</div>
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
									</div></figure>
								<h2>{{ $case->title }}</h2>
							</a>
						</div>
					@endforeach
				</div><!-- /c-roll -->
			</div><!-- /feed -->
			<div class="prev"></div>
			<div class="next"></div>
		</div><!-- /feed -->
	</div><!-- /inner -->
@stop

@section('footer')
	@include('layouts.front.footer.main')
@stop