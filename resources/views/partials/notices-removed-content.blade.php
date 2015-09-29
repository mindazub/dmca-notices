<h1 class="page-header">Removed Content Notices</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>This content:</th>
			<th>Acessible Here:</th>
			<th>is infringing upon here:</th>
			<th>Notice sent:</th>
			<th>Content removed:</th>
		</thead>
		<tbody>			
			@foreach($notices->where('content_removed', 1) as $notice)
				<tr>
					<td>{{ $notice->infringing_title }}</td>
					<td>{!! link_to($notice->infringing_link) !!}</td>
					<td>{!! link_to($notice->original_link) !!}</td>
					<td>{{ $notice->created_at->diffForHumans() }}</td>
					<td>
					{!! Form::open(['method'=>'PATCH', 'url'=>'notices/'.$notice->id]) !!}
						<div class="form-group">
						    {!! Form::checkbox('content_removed', $notice->content_removed, $notice->content_removed, ['data-click-submits-form'] ) !!}
							{!! Form::submit('Submit', ['class'=>'btn btn-xs btn-info']) !!}
						</div>						
					{!! Form::close() !!}
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>