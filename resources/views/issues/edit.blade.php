@extends ('app')
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_home')

		<div class="span9 pull-right">
			<div class="container panel panel-default full">
				<div class="panel-heading">
					Edit Issue
				</div>
				{!! Form::model($issue, ['method' => 'PATCH', 'action' => ['IssuesController@update', $issue->project_id, $issue->id]]) !!}
					<div class="panel-body">
						<table class="table-condensed table-hover"> <tbody>
							<tr>
								<td class="span3 right"> {!! Form::label('issue', '*Issue: ') !!}</td>
								<td> {!! Form::text('issue', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('status', '*Status: ') !!} </td>
								<td> <select class="span5" name="status" value="{{ old('status') }}">
										<option value="Open" <?php if($issue->status == 'Open') {echo("selected");} ?>> Open</option>
										<option value="Closed" <?php if($issue->status == 'Closed') {echo("selected");} ?>>Closed</option>
									</select> </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('severity', '*Severity: ') !!} </td>
								<td> <select class="span5" name="severity" value="{{ old('severity') }}">
										<option value="High" <?php if($issue->severity == 'High') {echo("selected");} ?>> 
											High</option>
										<option value="Medium" <?php if($issue->status == 'Medium') {echo("selected");} ?>> 
											Medium</option>
										<option value="Low" <?php if($issue->status == 'Low') {echo("selected");} ?>>
											Low</option>
									</select> </td>
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('owner', '*Owner: ') !!}</td>
								<td>{!! Form::text('owner', null, ['class' => 'span7']) !!}</td>
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('comment', 'Comment: ') !!}</td>
								<td>{!! Form::textarea('comment', null, ['class' => 'span7']) !!}</td>
							</tr>
						</tbody> </table>

						<div class = "submit">
							{!! Form::submit('Submit', ['class' => 'btn btn-warning']) !!}
							{!! Form::close() !!}
							
						</div>
					</div>
			</div>
		</div>
	</div>

@stop