@extends ('app')
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_home')

		<div class="span9 pull-right">
			<div class="container panel panel-default full">
				<div class="panel-heading">
					Create Risk
				</div>
				{!! Form::open(['route' => ['risks.store'], 'method' => 'post' ]) !!}
				{!! Form::hidden('project_id', $project->id) !!}
					<div class="panel-body">
						<table class="table-condensed table-hover"> <tbody>
							<tr>
								<td class="span3 right">{!! Form::label('risk', 'Risk: ') !!}</td>
								<td> {!! Form::text('risk', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('impact', 'Impact: ') !!} </td>
								<td> <select class="span5" name="impact" value="{{ old('impact') }}">
										<option value="High"> High</option>
										<option value="Medium">Medium</option>
										<option value="Low">Low</option>
									</select> </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('probability', 'Probability: ') !!} </td>
								<td> <select class="span5" name="probability" value="{{ old('probability') }}">
										<option value="High"> High</option>
										<option value="Medium"> Medium</option>
										<option value="Low">Low</option>
									</select> </td>
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('mitigation', 'Mitigation: ') !!}</td>
								<td>{!! Form::text('mitigation', null, ['class' => 'span7']) !!}</td>
							</tr>

						</tbody> </table>

						<div class = "submit">
							{!! Form::submit('Submit', ['class' => 'btn btn-warning']) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
@stop