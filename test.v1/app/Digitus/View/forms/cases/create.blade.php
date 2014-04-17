{{ Form::open(array('action'=>'admin.cases.store', 'files'=>true)) }}
{{ Form::hidden('author', $loggedUser->id) }}
<div class="form-group">
	{{ Form::label('file', 'Case Image') }}
	{{ $errors->first('file') }}
	{{ Form::file('file', '', array('class'=>'form-control')) }}
</div>
<div class="form-group col-6">
	{{ Form::label('klant', 'Klant') }}
	{{ $errors->first('klant') }}
	{{ Form::text('klant', '', array('class'=>'form-control')) }}
</div>
<div class="form-group col-6">
	{{ Form::label('klant_link', 'Klant Url') }}
	{{ $errors->first('klant_link') }}
	{{ Form::url('klant_link', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('title', 'Page Title') }}
	{{ $errors->first('title') }}
	{{ Form::text('title', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('link', 'Case link') }}
	{{ $errors->first('link') }}
	{{ Form::url('link', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('body', 'Page Body') }}
	{{ $errors->first('body') }}
	{{ Form::textarea('body', '', array('class'=>'form-control')) }}
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