@extends('layouts.front.main')

@section('title')
	Uw online marketing bureau
@stop

@section('menu')
	@include('layouts.front.menus.digimenu')
@stop

@section('notification')
@stop

@section('top')
	@include('home.intro.top')
@stop

@section('content')
	@foreach($pages as $page)
		<div class="page">
			{{$page->title}}
			{{$page->body}}
		</div>
	@endforeach
@stop

@section('footer')
	@include('layouts.front.footer.main')
@stop