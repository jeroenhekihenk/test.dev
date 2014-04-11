@extends('layouts.front.main')

@section('title')
Blog
@stop

@section('menu')
	@include('layouts.front.menus.digimenu')
@stop

@section('content')

<div class="blogroll container">


		<div class="panel panel-info">
			<div class="panel-heading">{{$tag->name}}</div>
		</div>



</div>

@stop

@section('pagination')
	<div class="row">
		<div class="span8">
			
		</div>
	</div>
@stop