{{ Form::open(array('method'=>'PUT','files'=>true,'action'=>array('admin.media.update',$image->id))) }}
<div class="form-group">
	{{ Form::label('image', 'Je wijzigt de titel voor het volgende plaatje:') }}
	<img src="{{URL::to($image->image) }}" alt="" class="show-off">
</div>
<div class="form-group">
	{{ Form::label('title', 'Titel') }}
	{{ $errors->first() }}
	{{ Form::text('title', $image->title, array('class'=>'form-control')) }}
</div>
{{ Form::submit('submit', array('class'=>'btn btn-success')) }}
{{ Form::close() }}