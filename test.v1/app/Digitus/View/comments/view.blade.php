@extends('layouts.back.admin')

@section('content')

	{{$comment->name}}<br />
	{{$comment->email}}<br/>
	{{$comment->website}}<br />
	{{$comment->bericht}}<br />
	{{$comment->id}}

{{ Form::open(array('method'=>'DELETE','action'=>array('comment.destroy',$comment->id))) }}
{{ Form::submit('delete') }}
{{ Form::close() }}
<a href="{{ URL::route('comment.edit',$comment->id) }}">edit</a>

@stop