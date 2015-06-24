@extends ('app')
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_home')

		<div class="span9 pull-right">
			<div class="container panel panel-default full">
				<div class="panel-heading">
					Edit Risk
				</div>
				{!! Form::model($risk, ['method' => 'PATCH', 'action' => ['RisksController@update', $risk->id]]) !!}
					<div class="panel-body">
						<table class="table-condensed table-hover"> <tbody>
							<tr>
								<td class="span3 right">{!! Form::label('risk', 'Risk: ') !!}</td>
								<td> {!! Form::text('risk', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('impact', 'Impact: ') !!} </td>
								<td> <select class="span5" name="impact" value="{{ old('impact') }}">
										<option value="High" <?php if($risk->impact == 'High') {echo("selected");} ?>> 
											High</option>
										<option value="Medium" <?php if($risk->impact == 'Medium') {echo("selected");} ?>>
											Medium</option>
										<option value="Low" <?php if($risk->impact == 'Low') {echo("selected");} ?>>
											Low</option>
									</select> </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('probability', 'Probability: ') !!} </td>
								<td> <select class="span5" name="probability" value="{{ old('probability') }}">
										<option value="High" <?php if($risk->probability == 'High') {echo("selected");} ?>> 
											High</option>
										<option value="Medium" <?php if($risk->probability == 'Medium') {echo("selected");} ?>>
											Medium</option>
										<option value="Low" <?php if($risk->probability == 'Low') {echo("selected");} ?>>
											Low</option>
									</select> </td>
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('mitigation', 'Mitigation: ') !!}</td>
								<td>{!! Form::text('mitigation', null, ['class' => 'span7']) !!}</td>
							</tr>

						</tbody> </table>

						<div class = "submit">
							{!! Form::submit('Submit', ['class' => 'btn btn-warning']) !!}
							{!! Form::close() !!}
							{!! Form::open(['route' => ['risks.destroy', $risk->id], 'method' => 'delete', 'class' => 'delete' ]) !!}
								{!! Form::submit('Delete', [ 'class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
						</div>
					</div>
			</div>
		</div>
	</div>

@stop