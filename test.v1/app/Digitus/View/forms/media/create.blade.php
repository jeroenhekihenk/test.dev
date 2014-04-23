{{ Form::open(array('action'=>'admin.media.store', 'files'=>true)) }}
{{ Form::hidden('author', $loggedUser->id) }}
<div class="form-group col-6">
	{{ Form::label('file', 'Image') }}
	{{ $errors->first('file') }}
	{{ Form::file('file', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('title', 'Image Title') }}
	{{ $errors->first('title') }}
	{{ Form::text('title', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::submit('Create', array('class'=>'btn btn-success')) }}</p>
	{{ Form::close() }}
</div>