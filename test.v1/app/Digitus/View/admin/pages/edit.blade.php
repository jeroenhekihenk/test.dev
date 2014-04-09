@extends('layouts.back.main')

@section('title')
	{{ $page->title }}
@stop

@section('menu')
	@include('layouts.back.menus.homemenu')
@stop

@section('sidebar')
	@include ('layouts.back.menu.adminmenu')
@stop

@section('content')
@if($loggedUser->roles->first()->name === 'Admin')
<div class="blogroll container col-sm-offset-2 col-md-offset-2 col-xs-offset-2 col-lg-offset-2">

		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 pull-left col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-offset-1 panel panel-info page-{{$page->id}}">
			
			{{ Form::open(array('method'=>'PUT','action'=>array('admin.pages.update',$page->slug))) }}

			<div class="form-group">
				{{ Form::label('title', 'Page Title')}}
				{{ Form::text('title', $page->title, array('class'=>'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('slug', 'Page Slug')}}
				{{ Form::text('slug', $page->slug, array('class'=>'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('body', 'Page Body')}}
				{{ Form::text('body', $page->body, array('class'=>'form-control')) }}
			</div>

			{{ Form::submit('Save', array('class'=>'btn btn-success')) }}

			{{ Form::close() }}
			
		</div>

</div>
@endif
@stop