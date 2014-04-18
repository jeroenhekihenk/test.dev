@extends('layouts.back.admin')

@section('title')
@stop

@section('notification')
@stop

@section('menu')
	@include('layouts.back.menus.homemenu')
@stop

@section('sidebar')
	@include ('layouts.back.menus.adminmenu')
@stop

@section('content')
@if($loggedUser->roles->first()->name === 'Admin')
<div class="col-10">
	@include('forms.workshops.create')
</div>
@endif
@stop

@section('footer')
@stop