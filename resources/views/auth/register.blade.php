@extends('layouts.master')

@section('content')

<div class="col-md-6">
{!! Form::open(array('url' => '/auth/register','class' => 'form')) !!}

<h1>Sign Up</h1>

@if (count($errors) > 0)
	<div class="alert alert-danger">
		Please correct the following errors:
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

<div class="form-group">
	{!! Form::label('username', 'Username:') !!}
	{!! Form::text('username', 'e.g. John Smith', array('class'=>'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('E-mail address:') !!}
	{!! Form::text('email', 'john.smith@cuttingage.com', array('class'=>'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('password:') !!}
	{!! Form::password('password', array('class'=>'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::label('Confirm password') !!}
	{!! Form::password('password_confirmation', array('class'=>'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::submit('Sign Up', array('class'=>'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
</div> 
@endsection
