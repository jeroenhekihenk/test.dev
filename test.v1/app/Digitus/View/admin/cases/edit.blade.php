@extends('layouts.back.admin')

@section('title')
	Editing '{{ $case->title }}'
@stop

@section('menu')
	@include('layouts.front.menus.homemenu')
@stop

@section('sidebar')
	@include('layouts.back.menus.adminmenu')
@stop

@section('sidebar2')
@stop

@section('content')
@if($loggedUser->roles->first()->name === 'Admin')
<div class="col-10">
	{{ Form::open(array('method'=>'PUT','files'=>true,'action'=>array('admin.cases.update',$case->slug))) }}
	<div class="sidebar2" style="max-width:230px">
			Uitgelichte afbeelding:<br/>
		
		{{ Form::file('file') }}
			
	</div>
	<div class="blogroll col-8">
		<div class="col-12 panel panel-info post-{{$case->id}}">
			

			<div class="form-group">
				{{ Form::label('title', 'Post Title')}}
				{{ Form::text('title', $case->title, array('class'=>'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('slug', 'Post Slug')}}
				{{ Form::text('slug', $case->slug, array('class'=>'form-control')) }}
			</div>

			<div class="form-group">
				{{ Form::label('body', 'Post Body')}}
				{{ Form::textarea('body', $case->body, array('class'=>'form-control')) }}
			</div>
			<hr>
			
				<p class="col-6">Bestaande categories:<br />
					@foreach($categories as $categorie)
						<span class="label label-warning" style="line-height:2.25">{{$categorie->name}}</span>
					@endforeach
				</p>
				<p class="col-6">Gekoppelde categories:<br />
					@foreach($case->categories as $categorie)
							<span class="label label-success" style="line-height:2.25">{{ $categorie->name }}</span>
					@endforeach
				</p>
			<div class="form-group col-12">
				{{ Form::label('addcategorie', 'Voeg een categorie toe:') }}
				<input type="text" name="addcategorie" class="form-control">
				{{ Form::label('delcategorie', 'Delete een categorie:') }}
				<input type="text" name="delcategorie" class="form-control" >
			</div>
			<hr>
			<hr>
				<p class="col-6">Bestaande tags:
					@foreach($tags as $tag)
						<span class="label label-warning" style="line-height:2.25">{{$tag->name}}</span>
					@endforeach
				</p>
				<p class="col-6">Gekoppelde tags:<br />
					@foreach($case->tags as $tag)
						<span class="label label-success" style="line-height:2.25">{{ $tag->name }}</span>
					@endforeach
				</p>
			<div class="form-group col-12">
				{{ Form::label('addtag', 'Voeg een tag toe:') }}
				<input type="text" name="addtag" class="form-control">
				{{ Form::label('deltag', 'Delete een tag:') }}
				<input type="text" name="deltag" class="form-control">
			</div>
			<div class="form-group">
				{{ Form::submit('Save', array('class'=>'btn btn-success')) }}
			</div>

			{{ Form::close() }}

			<hr>

			<div class="blogbottom" style="background-color: #FAFAFA; padding:15px 15px 10px; margin-bottom:15px; border:1px solid #F1F1F1; border-bottom-left-radius:2px;border-bottom-right-radius:2px;">
				<div class="pull-left">
					<p>Tags: 
						@foreach($case->tags as $tag)
							<a href="{{ URL::to('tags/'.$tag->name) }}" title="{{$tag->name}}" alt="{{$tag->name}}">{{ $tag->name }}</a>,  
						@endforeach
					</p>
					<p>Geplaatst in: 
						@foreach($case->categories as $categorie)
							<a href="{{ URL::route('admin.categorie.show',$categorie->name) }}">{{ $categorie->name }}</a> 
						@endforeach
					</p>
				</div>

				<div class="pull-right">
					<p>Auteur: {{$case->getAuthorUsername() }}</p>
					<p>Datum: {{$case->getUpdatedAtDay() }}</p>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
	</div>
@endif
</div>
@stop