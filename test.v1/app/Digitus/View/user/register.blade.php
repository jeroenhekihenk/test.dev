@extends('layouts.front.main')

@section('content')

<div class="col-md-4 col-md-offset-4">
    <div class="panel panel-info">
        <div class="panel-heading">Please Register</div>
        <div class="panel-body">
        @include('forms.register.register')
            <hr>
            <div class="form-group">
                <h2>Already have an account?</h2>
                {{ HTML::link('login', 'Login here', array('class'=>'btn btn-primary btn-xs')) }}
            </div>
            
        </div>
      </div>
</div>


@stop