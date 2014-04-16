@extends('layouts.back.admin')

@section('menu')
	@include('layouts.back.menus.homemenu')
@stop

@section('sidebar')

@stop

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	@if($loggedUser->roles->first()->name === 'Admin')
	
		{{ Form::open(array('action'=>'admin.insides.store','id'=>'newblogpost', 'files'=>true)) }}
	<div id="sidebar" class="sidebar col-sm-2 col-md-2">
		{{ Form::file('file') }}
	</div>
	<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
		<h2>Create new post</h2>
		<hr>

		{{ Form::hidden('author', $loggedUser->id) }}

		<div class="form-group">
			{{ Form::label('title', 'Post Title') }}
			{{ $errors->first('title') }}
			{{ Form::text('title', Input::old('title'), array('class'=>'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::label('body', 'Post Body') }}
			{{ $errors->first('body') }}
			{{ Form::textarea('body', Input::old('body'), array('class'=>'form-control')) }}
		</div>
		<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<p>Bestaande categories:<br />
				@foreach($categories as $categorie)
					<span class="label label-warning" style="line-height:2.25">{{$categorie->name}}</span>
				@endforeach
			</p>
		</div>
		<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<p>Bestaande tags:<br />
				@foreach($tags as $tag)
					<span class="label label-warning" style="line-height:2.25">{{$tag->name}}</span>
				@endforeach
			</p>
		</div>
		<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
			{{ Form::label('addcategorie', 'Voeg categorie toe') }} <small>(Max. 1)</small>
			{{ $errors->first('addcategorie') }}
			{{ Form::text('addcategorie', '', array('class'=>'form-control')) }}
		</div>
		<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
			{{ Form::label('addtag', 'Voeg tag toe') }} <small>(Min. 1)</small>
			{{ $errors->first('addtag') }}
			{{ Form::text('addtag', '', array('class'=>'form-control')) }}
		</div>
		<div class="form-group">
			{{ Form::submit('Create', array('class'=>'btn btn-success')) }}</p>
			{{ Form::close() }}
		</div>
	</div>
	@endif
</div>
@stop