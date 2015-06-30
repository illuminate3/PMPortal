@extends ('app')
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_home')

		<div class="span9 pull-right">
			<div class="container panel panel-default full">
				<div class="panel-heading">
					Edit Business Project Team Member
				</div>
				{!! Form::model($business_project_team_member, ['method' => 'PATCH', 'action' => ['BusinessProjectTeamMembersController@update', $business_project_team_member->project_id, $business_project_team_member->id]]) !!}
					<div class="panel-body">
						<table class="table-condensed table-hover"> 
							<tbody>
								<tr>
									<td class="span3 right"> {!! Form::label('name', 'Name: ') !!} </td>
									<td> {!! Form::text('name', old('name'), ['class' => 'span7']) !!} </td>
								</tr>
								<tr>
									<td class="span3 right"> {!! Form::label('role', 'Role: ') !!} </td>
									<td> {!! Form::text('role', old('role'), ['class' => 'span7']) !!} </td>
								</tr>
							</tbody>
						</table>

						<div class = "submit">
							{!! Form::submit('Submit', ['class' => 'btn btn-warning']) !!}
							{!! Form::close() !!}
						</div>
					</div>
			</div>
		</div>
	</div>
@stop