{{ Form::open(array('action'=>'admin.workshops.store', 'files'=>true)) }}
{{ Form::hidden('author', $loggedUser->id) }}
<div class="form-group col-6">
	{{ Form::label('file', 'Workshop Image') }}
	{{ $errors->first('file') }}
	{{ Form::file('file', '', array('class'=>'form-control')) }}
</div>
<div class="form-group col-6">
	{{ Form::label('datum', 'Workshop datum') }}
	{{ $errors->first('datum') }}
	{{ Form::input('date', 'datum', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('title', 'Workshop Title') }}
	{{ $errors->first('title') }}
	{{ Form::text('title', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('body', 'Workshop Body') }}
	{{ $errors->first('body') }}
	{{ Form::textarea('body', '', array('class'=>'form-control')) }}
</div>
<div class="form-group col-6">
	<p>Bestaande categories:<br />
		@foreach($categories as $categorie)
			<span class="label label-warning" style="line-height:2.25">{{$categorie->name}}</span>
		@endforeach
	</p>
</div>
<div class="form-group col-6">
	<p>Bestaande tags:<br />
		@foreach($tags as $tag)
			<span class="label label-warning" style="line-height:2.25">{{$tag->name}}</span>
		@endforeach
	</p>
</div>
<div class="form-group col-6">
	{{ Form::label('addcategorie', 'Voeg categorie toe') }} <small>(Max. 1)</small>
	{{ $errors->first('addcategorie') }}
	{{ Form::text('addcategorie', '', array('class'=>'form-control')) }}
</div>
<div class="form-group col-6">
	{{ Form::label('addtag', 'Voeg tag toe') }} <small>(Min. 1)</small>
	{{ $errors->first('addtag') }}
	{{ Form::text('addtag', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::submit('Create', array('class'=>'btn btn-success')) }}</p>
	{{ Form::close() }}
</div>