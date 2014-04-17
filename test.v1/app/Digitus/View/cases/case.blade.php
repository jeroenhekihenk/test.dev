@extends('layouts.front.main')

@section('menu')
	@include('layouts.front.menus.digimenu')
@stop

@section('content')
<div class="feed">
	<div class="col-12 case case-{{$case->id}}">
		<div class="case-body">
			<a class="case-img" href="{{URL::to($case->image)}}" style="background-image: url({{URL::to($case->image)}})"></a>
			<div class="case-about">
				<table style="width:100%">
					<tr>
						<td><span class="glyphicon glyphicon-pushpin"></span></td>
						<td><h2>{{$case->title}}</h2></td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-user"></span></td>
						<td><a href="{{URL::to($case->klant_link)}}" title="{{$case->klant}}">{{$case->klant}}</a></td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-eye-open"></span></td>
						<td><a href="{{URL::to($case->link)}}" title="">Bekijk project</a></td>
					</tr>
					<tr>
						<td><span class="glyphicon glyphicon-tags"></span></td>
						<td>
							@foreach($categories as $categorie)
								<span class="label label-primary">{{$categorie->name}}</span>
							@endforeach
							@foreach($tags as $tag)
								<span class="label label-info">{{$tag->name}}</span>
							@endforeach
						</td>
					</tr>
				</table>
			</div>
			<p>
				{{$case->body}}
			</p>
		</div>
	</div>
</div>
@stop