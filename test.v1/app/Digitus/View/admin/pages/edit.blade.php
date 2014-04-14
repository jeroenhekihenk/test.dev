@extends('layouts.back.main')

@section('title')
	{{ $page->title }}
@stop

@section('menu')
	@include('layouts.back.menus.homemenu')
@stop

@section('sidebar')
	@include ('layouts.back.menus.adminmenu')
@stop

@section('content')
@if($loggedUser->roles->first()->name === 'Admin')
<div class="blogroll container col-sm-offset-2 col-md-offset-2 col-xs-offset-2 col-lg-offset-2">

		<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 pull-left col-xs-offset-1 col-md-offset-1 col-sm-offset-1 col-lg-offset-1 panel panel-info page-{{$page->id}}">
			
			{{ Form::open(array('method'=>'PUT','action'=>array('admin.pages.update',$page->slug))) }}
{{ Form::label('layout', 'Selecteer layout:') }}
	{{ $errors->first('layout') }}
	{{ Form::select('layout', array('front.pagesidebar'=>'Pagina met sidebar','front.page'=>'Full-width','front.main'=>'Geen menu')) }}
	{{ Form::label('menu', 'Selecteerd menu:') }}
	{{ $errors->first('menu') }}
	{{ Form::select('menu', array('front.menus.digimenu'=>'Digi-menu', 'front.menus.homemenu'=>'Plat menu', 'front.menus.nomenu'=>'Geen menu')) }}
	{{ Form::label('footer', 'Gebruik footer:') }}
	{{ $errors->first('footer') }}
	{{ Form::select('footer', array('front.footer.main'=>'Ja','front.footer.geen'=>'Nee')) }}
			<div class="form-group">
				{{ Form::label('title', 'Page Title')}}
				{{ Form::text('title', $page->title, array('class'=>'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('body', 'Page Body')}}
				{{ Form::textarea('body', $page->body, array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				<img src="{{URL::to(''.'/'),$page->image}}" alt=""><br />
				{{ Form::label('file', 'Page Image') }}
				{{ $errors->first('file') }}
				{{ Form::file('file', '', array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('type', 'Select OG:type') }}
				{{ $errors->first('type') }}
				{{ Form::select('type', array('Article'=>'article', 'Website'=>'website')) }}
			</div>
			<div class="form-group">
				{{ Form::label('robots', 'Selecteer robot') }}
				{{ $errors->first('robots') }}
				{{ Form::select('robots', array('noindex, nofollow'=>'noindex, nofollow', 'index, nofollow'=>'index, nofollow','noindex, follow'=>'noindex, follow', 'index, follow'=>'index, follow')) }}
			</div>
			<div class="form-group">
				{{ Form::label('ogurl', 'OG:url') }}
				{{ $errors->first('ogurl') }}
				{{ Form::url('ogurl', $page->ogurl, array('class'=>'form-control')) }}
			</div>

			{{ Form::submit('Save', array('class'=>'btn btn-success')) }}

			{{ Form::close() }}
			
		</div>

</div>
@endif
@stop