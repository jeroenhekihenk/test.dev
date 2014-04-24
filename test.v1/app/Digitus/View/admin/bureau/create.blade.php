@extends('layouts.back.admin')

@section('menu')
	@include('layouts.back.menus.homemenu')
@stop

@section('sidebar')
	@include('layouts.back.menus.adminmenu')
@stop

@section('content')
<div class="col-10">
	@if($loggedUser->roles->first()->name === 'Admin')
		@include('forms.bureau.create')
	@endif
</div>
@stop