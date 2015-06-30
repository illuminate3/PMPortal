@extends ('app')
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_home')

		<div class="span9 pull-right">
			<div class="container panel panel-default full">
				<div class="panel-heading">
					Edit Milestone
				</div>
				{!! Form::model($milestone, ['method' => 'PATCH', 'action' => ['MilestonesController@update', $milestone->id]]) !!}
					<div class="panel-body">
						<table class="table-condensed table-hover"> <tbody>
							<tr>
								<td class="span3 right"> {!! Form::label('milestone', 'Milestone: ') !!} </td>
								<td> {!! Form::text('milestone', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('status', 'Status: ') !!} </td>
								<td> <select class="span5" name="status" value="{{ old('status') }}">
										<option value="Done" <?php if($milestone->status == 'Done') {echo("selected");} ?>> 
											Done</option>
										<option value="In Process" <?php if($milestone->status == 'In Process') {echo("selected");} ?>>
											In Process</option>
										<option value="Not Started" <?php if($milestone->status == 'Not Started') {echo("selected");} ?>>
											Not Started</option>
									</select> </td>
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('target_date', 'Target Date:') !!}</td>
								<td><input type="date" name="target_date" value="{{ old('custom_date', $milestone['target_date']->format('Y-m-d')) }}"></td>
								
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('actual_date', 'Actual Date:') !!}</td>
								<td><input type="date" name="actual_date" value="{{ old('custom_date', $milestone['actual_date']->format('Y-m-d')) }}"></td>
							</tr>

						</tbody> </table>

						<div class = "submit">
							{!! Form::submit('Submit', ['class' => 'btn btn-warning']) !!}
							{!! Form::close() !!}
							{!! Form::open(['route' => ['milestones.destroy', $milestone->id], 'method' => 'delete', 'class' => 'delete' ]) !!}
								{!! Form::submit('Delete', [ 'class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
						</div>
					</div>
			</div>
		</div>
	</div>

	{!! Form::close() !!}
	

@stop