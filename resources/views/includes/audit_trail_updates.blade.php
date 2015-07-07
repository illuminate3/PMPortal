
				<center>
					<table class="etable table-condensed table-hover project-show full sortable">
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
						@foreach ($deliverables as $deliverable)
							@foreach($deliverable->revisionHistory as $history )
							<tr class = "project-row">
								<td align="center">Deliverable</td>
								<td align="center">{{ $deliverable->project['title'] }} ({{ $deliverable['deliverable'] }})</td>
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
						@foreach ($business_project_team_members as $business_project_team_member)
							@foreach($business_project_team_member->revisionHistory as $history )
							<tr class = "project-row">
								<td align="center">Business Project Team</td>
								<td align="center">{{ $business_project_team_member->project['title'] }} ({{ $business_project_team_member['name'] }})</td>
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
						@foreach ($technical_project_team_members as $technical_project_team_member)
							@foreach($technical_project_team_member->revisionHistory as $history )
							<tr class = "project-row">
								<td align="center">Technical Project Team</td>
								<td align="center">{{ $technical_project_team_member->project['title'] }} ({{ $technical_project_team_member['name'] }})</td>
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
						@foreach ($support_team_members as $support_team_member)
							@foreach($support_team_member->revisionHistory as $history )
							<tr class = "project-row">
								<td align="center">Support Team</td>
								<td align="center">{{ $support_team_member->project['title'] }} ({{ $support_team_member['name'] }})</td>
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
						@if (Auth::user()->role == "System Administrator")
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
						@else
						@endif
						</tbody>
					</table>
				</center>
