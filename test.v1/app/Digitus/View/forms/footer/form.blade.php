{{ Form::open(array()) }}
{{ Form::email('email', '', array('class'=>'emailbrief','placeholder'=>'E-mailadres')) }}
{{ Form::submit('inschrijven nieuwsbrief', array('class'=>'btn btn-primary emailbrief')) }}
{{ Form::close() }}