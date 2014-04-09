@extends('layouts.back.admin')

@section('title')
@stop

@section('notification')
@stop

@section('menu')
	@include('layouts.back.menus.homemenu')
@stop

@section('sidebar')
	@include ('layouts.back.menu.adminmenu')
@stop

@section('content')
@if($loggedUser->roles->first()->name === 'Admin')
	@include('forms.pages.create')
@endif
@stop

@section('footer')
@stop