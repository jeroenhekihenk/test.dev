{{ Form::open(array('action'=>'admin.bureau.store')) }}
{{ Form::hidden('author', $loggedUser->id) }}

<div class="form-group">
	{{ Form::label('title', 'Titel:') }}
	{{ $errors->first('title') }}
	{{ Form::text('title', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('body', 'Content:') }}
	{{ $errors->first('body') }}
	{{ Form::textarea('body', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::submit('Create', array('class'=>'btn btn-success')) }}
	{{ Form::close() }}
</div>