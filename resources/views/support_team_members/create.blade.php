@extends ('app')
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_home')

		<div class="span9 pull-right">
			<div class="container panel panel-default full">
				<div class="panel-heading">
					Add Support Team Member
				</div>
				{!! Form::open(['route' => ['support_team_members.store'], 'method' => 'post' ]) !!}
				{!! Form::hidden('project_id', $project->id) !!}
					<div class="panel-body">
						<table class="table-condensed table-hover"> <tbody>
							<tr>
								<td class="span3 right"> {!! Form::label('name', '*Name: ') !!} </td>
								<td> {!! Form::text('name', null, ['class' => 'span7']) !!} </td>
							</tr>
							<tr>
								<td class="span3 right"> {!! Form::label('role', '*Role: ') !!} </td>
								<td> {!! Form::text('role', null, ['class' => 'span7']) !!} </td>
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