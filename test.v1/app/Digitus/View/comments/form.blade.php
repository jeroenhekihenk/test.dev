{{ Form::open(array('action'=>array('comment.create',$post->slug))) }}

<div class="form-group">
	{{ Form::label('naam', 'Naam') }}
	{{ Form::text('naam', '', array('class'=>'form-control','placeholder'=>'Uw naam..')) }}
</div>

<div class="form-group">
	{{ Form::label('email', 'Email') }} <small>(Uw email adres word niet openbaar weergegeven)</small>
	{{ Form::email('email', '', array('class'=>'form-control','placeholder'=>'Uw email adres..')) }}
</div>

<div class="form-group">
	{{ Form::label('website', 'Website') }}
	{{ Form::url('website', 'http://', array('class'=>'form-control', 'placeholder'=>'http://..')) }}
</div>

<div class="form-group">
	{{ Form::label('bericht', 'Uw bericht') }}
	{{ Form::textarea('bericht', '', array('class'=>'form-control','placeholder'=>'Uw bericht..')) }}
</div>

<div class="form-group">
	{{ Form::submit('Plaats reactie', array('class'=>'btn btn-success')) }}
</div>

{{ Form::close() }}