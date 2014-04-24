@extends('layouts.front.page')

@section('menu')
	@include('layouts.front.menus.digimenu')
@stop

@section('content')
	<div class="inner">
		<div class="feed">
			<div class="col-12">
				<div class="col-6 page-welcome">
						
					<h3 class="text-center page-heading">Digitus Marketing is een online marketing bureau <span class="black">gespecialiseerd</span> in Facebook Marketing.<br /><br/>

					<span class="black">Inspelen op actualiteiten</span> en de interesses van een doelgroep is voor ons een uitdaging. <span class="black">Sociale campagnes</span> gericht op gebruikers binnen een specifieke doelgroep, klanten en relaties van klanten.
					Partners een kracht. 
					</h3>
				</div>
			</div>
			<div style="clear:both"></div>
			<div class="feed">
				
					@foreach($blokken as $blok)
			
						<div class="col-4 bordered">
							<h2>{{$blok->title}}</h2>
							<p>{{$blok->body}}</p>
						</div>
						
					@endforeach
				
			</div><!-- /feed -->
		</div><!-- /feed -->
	</div><!-- /inner -->
@stop

@section('footer')
	@include('layouts.front.footer.main')
@stop