{{ Form::open(array('class'=>'form-news')) }}
{{ Form::email('email', null, array('class'=>'input-sm inp-btn-3','placeholder'=>'E-mailadres')) }}
{{ Form::submit('inschrijven nieuwsbrief', array('class'=>'input-sm btn-primary inp-btn-3')) }}
{{ Form::close(); }}