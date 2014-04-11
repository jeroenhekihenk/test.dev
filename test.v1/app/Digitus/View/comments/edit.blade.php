@extends('layouts.back.admin')

@section('content')

	{{ Form::open(array('method'=>'PUT','action'=>array('comment.update',$comment->id))) }}

	<div class="form-group">
		{{ Form::label('naam', 'Naam:') }}
		{{ Form::text('naam', $comment->naam, array('class'=>'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('email', 'Email:') }}
		{{ Form::email('email', $comment->email, array('class'=>'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('website', 'Website:') }}
		{{ Form::url('website', $comment->website, array('class'=>'form-control')) }}
	</div>
	<div class="form-group">
		{{ Form::label('bericht', 'Bericht:') }}
		{{ Form::textarea('bericht', $comment->bericht, array('class'=>'form-control')) }}
	</div>
	{{ Form::submit('update comment', array('class'=>'btn btn-success')) }}

	{{ Form::close() }}

@stop