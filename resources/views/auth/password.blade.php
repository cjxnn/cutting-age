@extends('layouts.master')

@section('content')

<div class="col-md-6">

{!! Form::open(array('url' => '/password/email', 'class' => 'form')) !!}

<h1>Password Recovery</h1>

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
	{!! Form::label('email', 'E-mail address:') !!}
	{!! Form::text('email', 'e.g. john.smith@cuttingage.com', array('class' => 'form-control')) !!}
</div>

<div class="form-group">
	{!! Form::submit('Reset', array('class' => 'btn btn-primary')) !!}
</div>

{!! Form::close() !!}
</div>

@endsection
