{{ Form::open(array('action'=>'admin.pages.store')) }}
{{ Form::hidden('author', $loggedUser->id) }}
<div class="form-group">
	{{ Form::label('title', 'Page Title') }}
	{{ $errors->first('title') }}
	{{ Form::text('title', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('body', 'Page Body') }}
	{{ $errors->first('body') }}
	{{ Form::text('body', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('image', 'Page Image') }}
	{{ $errors->first('image') }}
	{{ Form::text('image', '', array('class'=>'form-control')) }}
</div>
<!-- META GEDOE -->
{{ Form::submit('Create', array('class'=>'btn btn-success')) }}
{{ Form::close() }}