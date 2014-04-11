{{ Form::open(array('action'=>'admin.pages.store', 'files'=>true)) }}
{{ Form::hidden('author', $loggedUser->id) }}
<div class="form-group">
	{{ Form::label('title', 'Page Title') }}
	{{ $errors->first('title') }}
	{{ Form::text('title', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('body', 'Page Body') }}
	{{ $errors->first('body') }}
	{{ Form::textarea('body', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('file', 'Page Image') }}
	{{ $errors->first('file') }}
	{{ Form::file('file', '', array('class'=>'form-control')) }}
</div>
<div class="form-group">
	{{ Form::label('type', 'Select OG:type') }}
	{{ $errors->first('type') }}
	{{ Form::select('type', array('Article'=>'article', 'Website'=>'website')) }}
</div>
<div class="form-group">
	{{ Form::label('robots', 'Selecteer robot') }}
	{{ $errors->first('robots') }}
	{{ Form::select('robots', array('noindex, nofollow'=>'noindex, nofollow', 'index, nofollow'=>'index, nofollow','noindex, follow'=>'noindex, follow', 'index, follow'=>'index, follow')) }}
</div>
<div class="form-group">
	{{ Form::label('ogurl', 'OG:url') }}
	{{ $errors->first('ogurl') }}
	{{ Form::url('ogurl', '', array('class'=>'form-control')) }}
</div>

<!-- META GEDOE -->
{{ Form::submit('Create', array('class'=>'btn btn-success')) }}
{{ Form::close() }}