@extends('layouts.master')

@section('content')

<h1 class="page-heading">Confirm</h1>


{!! Form::open(['action'=>'NoticesController@store']) !!}

		<div class="form-group">
		    {!! Form::label('') !!}
		    {!! Form::textarea('template', $template, array('class'=>'form-control')) !!}
		</div>

		<div class="form-group">
		    {!! Form::submit('Deliver', ['class' => 'btn btn-primary form-control']) !!}
		</div>

{!! Form::close() !!}


@stop