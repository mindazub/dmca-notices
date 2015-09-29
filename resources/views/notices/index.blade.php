@extends('layouts.master')
@section('content')
	<h1 class="page-header">Notices</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>This content:</th>
			<th>Acessible Here:</th>
			<th>is infringing upon here:</th>
			<th>Notice sent:</th>
			<th>Content removed:</th>
		</thead>
		<tbody>			
			@foreach($notices as $notice)
				<tr>
					<td>{{ $notice->infringing_title }}</td>
					<td>{!! link_to($notice->infringing_link) !!}</td>
					<td>{!! link_to($notice->original_link) !!}</td>
					<td>{{ $notice->created_at->diffForHumans() }}</td>
					<td>
					{!! Form::open(['method'=>'PATCH', 'url'=>'notices/'.$notice->id]) !!}
						<div class="form-group">
						    {!! Form::checkbox('content_removed', $notice->content_removed, $notice->content_removed ) !!}
							{!! Form::submit('Submit', ['class'=>'btn btn-xs btn-info']) !!}
						</div>
						
					{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	@unless(count($notices))
		<h5>You have no DMCA notices sent. You can try <a href="/notices/create">to sent one</a>. </h5>
	@endunless
@stop