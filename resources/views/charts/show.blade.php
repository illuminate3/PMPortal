@extends ('app')
@section('header')
@stop
@section('content')
<div class="row-fluid">
	<!--sidebar content-->
	@include('includes.sidebar_show')

	<div class="span9 pull-right">
		<div class="container panel panel-default full">
			<div class="panel-heading">
				{{ $project-> title }} - Organizational Chart
				@if (Auth::guest())
				@else
					@if ($project['user_id'] == null)
					@else
						@if ($project['user_id'] == Auth::user()['id'])
							<a class="pull-right add" href="{{ action('ChartsController@edit', [$project->id] ) }}"> <i class="glyphicon glyphicon-pencil"></i> Edit Chart</a>
						@else
						@endif
					@endif
				@endif
			</div>
			<div class ="panel-body">
				<table class="etable table-condensed table-hover project-show">
					<tbody>
						<tr>
							<td class="span2 right">Project Sponsor:</td>
							<td class="span 8 left">{{ $chart['project_sponsor'] }}</td>
						</tr>
						<tr>
							<td class="span2 right">Product Owner:</td>
							<td class="span 8 left">{{ $chart['product_owner'] }}</td>
						</tr>
						<tr>
							<td class="span2 right">Project Director</td>
							<td class="span 8 left">{{ $chart['project_director'] }}</td>
						</tr>
						<tr>
							<td class="span2 right">Project Manager:</td>
							<td class="span 8 left">{{ $chart['project_manager'] }}</td>
						</tr>
						<tr>
							<td class="span2 right">Audit:</td>
							<td class="span 8 left">{{ $chart['audit'] }}</td>
						</tr>
						<tr>
							<td class="span2 right">Group Compliance:</td>
							<td class="span 8 left">{{ $chart['group_compliance'] }}</td>
						</tr>
						<tr>
							<td class="span2 right">Business Project Manager:</td>
							<td class="span 8 left">{{ $chart['business_project_manager'] }}</td>
						</tr>
						<tr>
							<td class="span2 right">Business Analyst:</td>
							<td class="span 8 left">{{ $chart['business_analyst'] }}</td>
						</tr>
						<tr>
							<td class="span2 right">Quality Management:</td>
							<td class="span 8 left">{{ $chart['quality_management'] }}</td>
						</tr>
						<tr>
							<td class="span2 right">IT Security:</td>
							<td class="span 8 left">{{ $chart['it_security'] }}</td>
						</tr>
						<tr>
							<td class="span2 right">Enterprise Architecture:</td>
							<td class="span 8 left">{{ $chart['enterprise_architecture'] }}</td>
						</tr>
						<tr>
							<td class="span2 right">Strategic Procurement:</td>
							<td class="span 8 left">{{ $chart['strategic_procurement'] }}</td>
						</tr>
						<tr>
							<td class="span2 right">Technical Project Manager:</td>
							<td class="span 8 left">{{ $chart['technical_project_manager'] }}</td>
						</tr>
					</tbody>
				</table>
				<table class="etable table-condensed table-hover project-show table-head">
					<tbody>
					<tr> 
						<th colspan="2">Support Team: </th> 
						@if (Auth::guest())
						@else
							@if ($project['user_id'] == null)
							@else
								@if ($project['user_id'] == Auth::user()['id'])
								<th class="pull-right add">	<a class="add" href="{{ action('SupportTeamMembersController@create', [$project->id] ) }}"> <i class="glyphicon glyphicon-plus"></i> Add Support Team Member:</a></th>
								@endif
							@endif
						@endif
					</tr>
					</tbody>
				</table>
				<table class="etable table-condensed table-hover project-show full">
					<thead>
						<tr>
						<th width="20%">Name</th>
						<th width="20%">Role</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($support_team_members as $support_team_member)
							<tr>
							<td align="center">{{ $support_team_member-> name }} </td>
							<td align="center">{{ $support_team_member-> role}}</td>
							@if (Auth::guest())
							@else
								@if ($project->user_id == null)
								@else
									@if (Auth::user()->id == $project->user_id)
									<td><a href="{{ action('SupportTeamMembersController@edit', [$support_team_member->project_id, $support_team_member->id]) }}"> Edit</a></td>
									<td>
										{!! Form::open(['route' => ['support_team_members.destroy', $support_team_member->project_id, $support_team_member->id], 'method' => 'delete', 'class' => 'delete' ]) !!}
     									{!! Form::submit('Delete') !!}
		 								{!! Form::close() !!}
		 							</td>
   								 	@endif
								@endif
							@endif
							</tr>
						@endforeach
					</tbody>
				</table>
				<table class="etable table-condensed table-hover project-show table-head">
					<tbody>
					<tr> 
						<th colspan="2">Technical Project Team: </th> 
						@if (Auth::guest())
						@else
							@if ($project['user_id'] == null)
							@else
								@if ($project['user_id'] == Auth::user()['id'])
								<th class="pull-right add">	<a class="add" href="{{ action('TechnicalProjectTeamMembersController@create', [$project->id] ) }}"> <i class="glyphicon glyphicon-plus"></i> Add Technical Project Team Member:</a></th>
								@endif
							@endif
						@endif
					</tr>
					</tbody>
				</table>
				<table class="etable table-condensed table-hover project-show full">
					<thead>
						<tr>
						<th width="20%">Name</th>
						<th width="20%">Role</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($technical_project_team_members as $technical_project_team_member)
							<tr>
							<td align="center">{{ $technical_project_team_member-> name }} </td>
							<td align="center">{{ $technical_project_team_member-> role}}</td>
							@if (Auth::guest())
							@else
								@if ($project->user_id == null)
								@else
									@if (Auth::user()->id == $project->user_id)
									<td><a href="{{ action('TechnicalProjectTeamMembersController@edit', [$technical_project_team_member->project_id, $technical_project_team_member->id] ) }}"> Edit</a></td>
									<td>
										{!! Form::open(['route' => ['technical_project_team_members.destroy', $technical_project_team_member->project_id, $technical_project_team_member->id], 'method' => 'delete', 'class' => 'delete' ]) !!}
     									{!! Form::submit('Delete') !!}
		 								{!! Form::close() !!}
		 							</td>
		 							@endif
								@endif
							@endif
							</tr>
						@endforeach
					</tbody>
				</table>
				<table class="etable table-condensed table-hover project-show table-head">
					<tbody>
					<tr> 
						<th colspan="2">Business Project Team: </th> 
						@if (Auth::guest())
						@else
							@if ($project['user_id'] == null)
							@else
								@if ($project['user_id'] == Auth::user()['id'])
								<th class="pull-right add">	<a class="add" href="{{ action('BusinessProjectTeamMembersController@create', [$project->id] ) }}"> <i class="glyphicon glyphicon-plus"></i> Add Business Project Team Member:</a></th>
								@endif
							@endif
						@endif
					</tr>
					</tbody>
				</table>
				<table class="etable table-condensed table-hover project-show full">
					<thead>
						<tr>
						<th width="20%">Name</th>
						<th width="20%">Role</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($business_project_team_members as $business_project_team_member)
							<tr>
							<td align="center">{{ $business_project_team_member-> name }} </td>
							<td align="center">{{ $business_project_team_member-> role}}</td>
							@if (Auth::guest())
							@else
								@if ($project->user_id == null)
								@else
									@if (Auth::user()->id == $project->user_id)
									<td><a href="{{ action('BusinessProjectTeamMembersController@edit', [$business_project_team_member->project_id, $business_project_team_member->id] ) }}"> Edit</a></td>
									<td>
										{!! Form::open(['route' => ['business_project_team_members.destroy', $business_project_team_member->project_id, $business_project_team_member->id], 'method' => 'delete', 'class' => 'delete' ]) !!}
     									{!! Form::submit('Delete') !!}
		 								{!! Form::close() !!}
		 							</td>
		 							@endif
								@endif
							@endif
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop