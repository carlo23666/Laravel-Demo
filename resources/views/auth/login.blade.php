{!! Form::open(['url' => 'auth/login', 'class' => 'form']) !!}

{!! Form::email('email', '', ['class'=> 'form-control']) !!}

{!! Form::password('password', ['class'=> 'form-control']) !!}

<label>

<input name="remember" type="checkbox">Remember me

</label>

{!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}