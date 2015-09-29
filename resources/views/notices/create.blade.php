@extends('layouts.master')

@section('content')


<div class="container">
	
	<h1 class="page-heading">Prepare a DMCA Notice</h1>

	{!! Form::open(['method'=>'GET', 'action' => 'NoticesController@confirm']) !!}


		<div class="form-group">
		    {!! Form::label('provider_id', 'Who we are sending this to?') !!}
		    {!! Form::select('provider_id', $providers, null, ['class'=>'form-control']) !!}
		</div>
		
		<div class="form-group">
		    {!! Form::label('infringing_title', 'What is the title of infringing content?') !!}
		    {!! Form::text('infringing_title', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		    {!! Form::label('infringing_link', 'Where this contrnt is located?') !!}
		    {!! Form::text('infringing_link', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		    {!! Form::label('original_link', 'Link of you original content:') !!}
		    {!! Form::text('original_link', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		    {!! Form::label('original_description', 'The description of your original content and DMCA Notice:') !!}
		    {!! Form::text('original_description', null, ['class'=>'form-control']) !!}
		</div>
		
		<div class="form-group">
		    {!! Form::submit('Preview Notice', ['class'=>' btn btn-primary form-control']) !!}
		</div>

	{!! Form::close() !!}

	@include('errors.list')


</div>



@stop