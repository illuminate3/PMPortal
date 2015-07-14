@extends ('app')
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_home')

		<div class="span9 pull-right">
			<div class="container panel panel-default full">
				<div class="panel-heading">
					Create Action Item
				</div>
				{!! Form::open(['route' => ['actions.store'], 'method' => 'post' ]) !!}
				{!! Form::hidden('project_id', $project->id) !!}
					<div class="panel-body">
						<table class="table-condensed table-hover"> <tbody>
							<tr>
								<td class="span3 right"> {!! Form::label('action_item', '*Action: ') !!}</td>
								<td> {!! Form::text('action_item', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('status', '*Status: ') !!} </td>
								<td> <select class="span5" name="status" value="{{ old('status') }}">
										<option value="Open"> Open</option>
										<option value="Closed">Closed</option>
									</select> </td>
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('owner', '*Owner: ') !!}</td>
								<td>{!! Form::text('owner', null, ['class' => 'span7']) !!}</td>
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('target_date', '*Target Date: ') !!}</td>
								<td>{!! Form::input('date','target_date', date('Y-m-d'), ['class' => 'span5']) !!}</td>
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('comment', 'Comment: ') !!}</td>
								<td>{!! Form::textarea('comment', null, ['class' => 'span7']) !!}</td>
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

@stop