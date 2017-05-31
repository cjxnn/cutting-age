@extends('layouts.master')

@section('content')
<div class="col-md-6">

{!! Form::open(array('url' => '/auth/login', 'class' => 'form')) !!}

<h1>Sign In</h1>

@if (count($errors) > 0)
	<div class="alert alert-danger">
		Please correct the following errors:
		<ul>
			@foreach($errors->all() as $error)
				<li>P{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<div class="form-group">
	{!! Form::label('email', 'E-mail address') !!}
 	{!! Form::text('email', 'e.g. john.smith@cuttingage.com', array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('password', 'Password') !!}
	{!! Form::password('password', null, array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	<label>
		{!! Form::checkbox('remember', 'remember') !!} Remember Me
	</label>
</div>

<div class="form-group">
	{!! Form::submit('login', array('class' => 'btn btn-primary')) !!}
</div>

<a ref="/password/email">Forgot your password?</a>
</div>
</div>

{!! Form::close() !!}
</div>

@endsection
