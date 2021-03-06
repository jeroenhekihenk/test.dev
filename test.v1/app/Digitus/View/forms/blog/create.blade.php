{{ Form::open(array('action'=>'admin.insides.store','id'=>'newblogpost', 'files'=>true)) }}
	<div id="sidebar" class="sidebar col-2">
		{{ Form::file('file') }}
	</div>
	<div class="col-8">
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
	</div>