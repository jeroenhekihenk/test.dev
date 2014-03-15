{{ Form::open(array('class'=>'contact-form')) }}
{{ Form::text('naam', '', array('placeholder'=>'Naam..')) }}
{{ Form::email('email', '', array('placeholder'=>'E-mailadres..')) }}
{{ Form::text('telefoon', '', array('placeholder'=>'Telefoonnr..')) }}
{{ Form::textarea('bericht', '', array('rows'=>'6','cols'=>'40','placeholder'=>'Uw bericht..')) }}
{{ Form::submit('verzenden') }}
{{ Form::close() }}