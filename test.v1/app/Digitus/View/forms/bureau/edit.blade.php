{{ Form::open(array('method'=>'PUT','action'=>array('admin.bureau.update',$blok->id))) }}
{{ Form::hidden('author', $loggedUser->id) }}

<div class="form-group">
	{{ Form::label('title', 'Titel:') }}
	{{ $errors->first('title') }}
	{{ Form::text('title', $blok->title, array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('body', 'Content:') }}
	{{ $errors->first('body') }}
	{{ Form::textarea('body', $blok->body, array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::submit('Create', array('class'=>'btn btn-success')) }}
	{{ Form::close() }}
</div>