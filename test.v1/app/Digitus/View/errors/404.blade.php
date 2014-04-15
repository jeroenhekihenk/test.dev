@extends('layouts.front.errors.404')

@section('menu')
	@include('layouts.front.menus.digimenu')
@stop

@section('content')
	
	<div class="container">
		<div class="verticaal">
			<div class="ohoh-left">
				<div class="rabbit"></div>
				<div class="clouds"></div>
			</div>
			<div class="ohoh-right">
				<h3 class="ohoh"></h3>
				<hr>
				<p class="ohoh">
					<b class="ohoh">Ohoh..</b>
					Het lijkt er op dat er iets mis is gegaan..<br />
					De pagina die je probeerde te bezoeken bestaat niet (meer).<br />
					<br />
					<a href="{{ URL::previous() }}" title="" class="ohoh"><span class="arrow-right"></span> Keer terug naar de homepagina</a>
				</p>
			</div>
		</div>
	</div>
@stop
