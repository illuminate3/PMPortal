@extends ('app')
@section('header')
	<script src="{{ asset('/sorttable.js') }}"></script>
@endsection
@section('content')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_home')


		<div class="span9 pull-right">
			<div class="panel-heading" style="font-size:14px;">
			<b>UPDATES</b>
			<div class="pull-right add">
			<a href="{{ url('/change_log/deleteOldest') }}"> <i class="glyphicon"></i>Delete Oldest 50 Records</a>
			<a href="{{ url('/change_log/clean') }}"> <i class="glyphicon"></i>Clear All</a>
			</div>
			</div>

			<div class ="well project-table">
				<center>
					<table class="sortable full">
						<thead>
							<tr>
								<th width="15%">Type</th>
								<th width="10%">Project/User</th>
								<th width="10%">Updated By</th>
								<th width="10%">Field</th>
								<th width="10%">Old Value</th>
								<th width="10%">New Value</th>
								<th width="10%">Updated At</th>
							</tr>
						</thead>
						<tbody>

						@foreach ($projects as $project)
							@foreach($project->revisionHistory as $history )
							<tr class = "project-row">
								<td align="center">Project</td>
								<td align="center">{{ $project['title'] }}</td>
							<?php 
							$user = App\User::where('id',$history['user_id'])->first();
							if ($user == null) { ?>
								<td align="center">User Deleted</td>
								@include('includes.audit_trail')
							</tr>
							<?php } else { ?>
								<td align="center">{{ $history->userResponsible()->name }}</td>
								@include('includes.audit_trail')
							</tr>
							<?php } ?>
							@endforeach
						@endforeach
						@foreach ($milestones as $milestone)
							@foreach($milestone->revisionHistory as $history )
							<tr class = "project-row">
								<td align="center">Milestone</td>
								<td align="center">{{ $milestone->project['title'] }} ({{ $milestone['milestone'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td align="center">User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td align="center">{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								<?php } ?>
							@endforeach
						@endforeach
						@foreach ($accomplishments as $accomplishment)
							@foreach($accomplishment->revisionHistory as $history )
							<tr class = "project-row">
								<td align="center">Accomplishment</td>
								<td align="center">{{ $accomplishment->project['title'] }} ({{ $accomplishment['accomplishment'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td align="center">User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td align="center">{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								<?php } ?>
							@endforeach
						@endforeach
						@foreach ($issues as $issue)
							@foreach($issue->revisionHistory as $history )
							<tr class = "project-row">
								<td align="center">Issue</td>
								<td align="center">{{ $issue->project['title'] }} ({{ $issue['issue'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td align="center">User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td align="center">{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								<?php } ?>
							@endforeach
						@endforeach
						@foreach ($actions as $action)
							@foreach($action->revisionHistory as $history )
							<tr class = "project-row">
								<td align="center">Action</td>
								<td align="center">{{ $action->project['title'] }} ({{ $action['action_item'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td align="center">User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td align="center">{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								<?php } ?>
							@endforeach
						@endforeach
						@foreach ($risks as $risk)
							@foreach($risk->revisionHistory as $history )
							<tr class = "project-row">
								<td align="center">Risk</td>
								<td align="center">{{ $risk->project['title'] }} ({{ $risk['risk'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td align="center">User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td align="center">{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								<?php } ?>
							@endforeach
						@endforeach
						@foreach ($expenses as $expense)
							@foreach($expense->revisionHistory as $history )
							<tr class = "project-row">
								<td align="center">Expense</td>
								<td align="center">{{ $expense->project['title'] }} ({{ $expense['item'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td align="center">User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td align="center">{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								<?php } ?>
							@endforeach
						@endforeach
						@foreach ($users as $user)
							@foreach($user->revisionHistory as $history )
							<?php 
							$user = App\User::where('id',$history['revisionable_id'])->first();
							if ($user == null) { ?>
								@if($history->fieldName() == 'Password')
								<tr class = "project-row">
									<td align="center">User</td>
									<td align="center">User Deleted</td>
									<td align="center">{{ $history->userResponsible()->name }}</td>
									<td align="center">{{ $history->fieldName() }} </td>
									<td align="center">***</td>
									<td align="center">***</td>
									<td align="center">{{ $history->updated_at }}</td>
								</tr>
								@else
									<tr class = "project-row">
									<td align="center">User</td>
									<td align="center">User Deleted</td>
									<td align="center">{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								@endif
							<?php } else { ?>
								@if($history->fieldName() == 'Password')
									<tr class = "project-row">
										<td align="center">User</td>
										<td align="center">-</td>
										<td align="center">{{ $history->userResponsible()->name }}</td>
										<td align="center">{{ $history->fieldName() }} </td>
										<td align="center">***</td>
										<td align="center">***</td>
										<td align="center">{{ $history->updated_at }}</td>
									</tr>
								@else
								<tr class = "project-row">
									<td align="center">User</td>
									<td align="center">-</td>
									@include('includes.audit_trail')
								</tr>
								@endif
							<?php } ?>
							@endforeach
						@endforeach
						</tbody>
					</table>
				</center>
			</div>

			<div class="panel-heading" style="font-size:14px;">
			<b>ACTIONS</b>
			<div class="pull-right add">
			<a href="{{ url('/activity_log/deleteOldest') }}"> <i class="glyphicon"></i>Delete Oldest 50 Records</a>
			<a href="{{ url('/activity_log/clean') }}"> <i class="glyphicon"></i>Clear All</a>
			</div>
			</div>

			<div class ="well project-table" >
				<center>
					<table class="sortable full">
						<thead>
							<tr>
								<th width="10%">Type</th>
								<th width="10%">Project/User</th>
								<th width="10%">Action</th>
								<th width="10%">Done By</th>
								<th width="10%">Timestamp</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($activities as $activity)
							<?php 
							$user = App\User::where('id',$activity['user_id'])->first();
							if ($user == null) {
								?>
								<tr class = "project-row">
								<td align="center">{{ $activity['type'] }}</td>
								<td align="center">{{ $activity['name'] }}</td>
								<td align="center">{{ $activity['action'] }}</td>
								<td align="center">User Deleted</td>
								<td align="center">{{ $activity['created_at'] }}</td>
								</tr>
							<?php } elseif (($activity['user']->name == $activity['name']) && ($activity['type'] == "User") && ($activity['action'] = "Updated") ){ ?>
							<?php } else { ?>
								<tr class = "project-row">
								<td align="center">{{ $activity['type'] }}</td>
								<td align="center">{{ $activity['name'] }}</td>
								<td align="center">{{ $activity['action'] }}</td>
								<td align="center">{{ $activity['user']->name }}</td>
								<td align="center">{{ $activity['created_at'] }}</td>
								</tr>
							<?php } ?>
						@endforeach
						</tbody>
					</table>
				</center>
			</div>

		</div>
	</div>
@endsection
@stop
