@extends('layouts.main')

@section('content')

<h2>Admin Section</h2>

	{{ HTML::link('logout', 'Logout', array('class'=>'btn btn-warning')) }}

@stop