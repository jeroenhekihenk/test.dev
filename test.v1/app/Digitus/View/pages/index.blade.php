@extends('layouts.'.$layout)

@section('title')
@stop

@section('bodyid')
@stop

@section('menu')
	@include('layouts.'.$menu)
@stop

@section('notification')
@stop

@section('sidebar')
@stop

@section('content')
<div class="container">
	<figure class="page-header" style="background-image:url('{{ URL::to($page->image) }}');"></figure>
	<h2>{{$page->title}}</h2>
	<p>{{$page->body}}</p>
</div>
@stop

@section('footer')
	@include('layouts.'.$footer)
@stop