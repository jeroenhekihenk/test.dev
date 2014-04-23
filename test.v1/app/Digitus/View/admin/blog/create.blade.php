@extends('layouts.back.admin')

@section('menu')
	@include('layouts.back.menus.homemenu')
@stop

@section('sidebar')

@stop

@section('content')
<div class="col-12">
	@if($loggedUser->roles->first()->name === 'Admin')
		@include('forms.blog.create')
	@endif
</div>
@stop