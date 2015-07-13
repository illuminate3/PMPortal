
				<center>
					<table class="auditupdate wrap">
						<thead>
							<tr>
								<th width="12%">Type</th>
								<th width="11%">Project/ User</th>
								<th width="14%">Updated By</th>
								<th width="11%">Field</th>
								<th width="19%">Old Value</th>
								<th width="19%">New Value</th>
								<th width="14%">Updated At</th>
							</tr>
						</thead>
						<tbody>

						@foreach ($projects as $project)
							@foreach($project->revisionHistory as $history )
							<tr>
								<td>Project</td>
								<td>{{ $project['title'] }}</td>
							<?php 
							$user = App\User::where('id',$history['user_id'])->first();
							if ($user == null) { ?>
								<td>User Deleted</td>
								@include('includes.audit_trail')
							</tr>
							<?php } else { ?>
								<td>{{ $history->userResponsible()->name }}</td>
								@include('includes.audit_trail')
							</tr>
							<?php } ?>
							@endforeach
						@endforeach
						@foreach ($milestones as $milestone)
							@foreach($milestone->revisionHistory as $history )
							<tr>
								<td>Milestone</td>
								<td>{{ $milestone->project['title'] }} ({{ $milestone['milestone'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td>User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td>{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								
								<?php } ?>
							@endforeach
						@endforeach
						@foreach ($accomplishments as $accomplishment)
							@foreach($accomplishment->revisionHistory as $history )
							<tr>
								<td>Accomplishment</td>
								<td>{{ $accomplishment->project['title'] }} ({{ $accomplishment['accomplishment'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td>User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td>{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								<?php } ?>
							@endforeach
						@endforeach
						@foreach ($issues as $issue)
							@foreach($issue->revisionHistory as $history )
							<tr>
								<td>Issue</td>
								<td>{{ $issue->project['title'] }} ({{ $issue['issue'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td>User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td>{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								<?php } ?>
							@endforeach
						@endforeach
						@foreach ($actions as $action)
							@foreach($action->revisionHistory as $history )
							<tr>
								<td>Action</td>
								<td>{{ $action->project['title'] }} ({{ $action['action_item'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td>User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td>{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								<?php } ?>
							@endforeach
						@endforeach
						@foreach ($risks as $risk)
							@foreach($risk->revisionHistory as $history )
							<tr>
								<td>Risk</td>
								<td>{{ $risk->project['title'] }} ({{ $risk['risk'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td>User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td>{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								<?php } ?>
							@endforeach
						@endforeach
						@foreach ($expenses as $expense)
							@foreach($expense->revisionHistory as $history )
							<tr>
								<td>Expense</td>
								<td>{{ $expense->project['title'] }} ({{ $expense['item'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td>User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td>{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								<?php } ?>
							@endforeach
						@endforeach

					 	@foreach ($deliverables as $deliverable)

							@foreach($deliverable->revisionHistory as $history )
							<tr>
								<td>Deliverable</td>
								<td>{{ $deliverable->project['title'] }} ({{ $deliverable['deliverable'] }})</td>
								
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td>User Deleted</td>									
								<?php } else { ?>
									<td>{{ $history->userResponsible()->name }}</td>					
								<?php } ?>
								@include('includes.audit_trail')
							@endforeach
						@endforeach

						@foreach ($business_project_team_members as $business_project_team_member)
							@foreach($business_project_team_member->revisionHistory as $history )
							<tr>
								<td>Business Project Team</td>
								<td>{{ $business_project_team_member->project['title'] }} ({{ $business_project_team_member['name'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td>User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td>{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								<?php } ?>
							@endforeach
						@endforeach 
						@foreach ($technical_project_team_members as $technical_project_team_member)
							@foreach($technical_project_team_member->revisionHistory as $history )
							<tr>
								<td>Technical Project Team</td>
								<td>{{ $technical_project_team_member->project['title'] }} ({{ $technical_project_team_member['name'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td>User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td>{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								<?php } ?>
							@endforeach
						@endforeach
						@foreach ($support_team_members as $support_team_member)
							@foreach($support_team_member->revisionHistory as $history )
							<tr>
								<td>Support Team</td>
								<td>{{ $support_team_member->project['title'] }} ({{ $support_team_member['name'] }})</td>
								<?php 
								$user = App\User::where('id',$history['user_id'])->first();
								if ($user == null) { ?>
									<td>User Deleted</td>
									@include('includes.audit_trail')
								</tr>
								<?php } else { ?>
									<td>{{ $history->userResponsible()->name }}</td>
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
								<tr>
									<td>User</td>
									<td>User Deleted</td>
									<td>{{ $history->userResponsible()->name }}</td>
									<td>{{ $history->fieldName() }} </td>
									<td>***</td>
									<td>***</td>
									<td>{{ $history->updated_at->format('M j, Y h:i A') }}</td>
								</tr>
								@else
									<tr>
									<td>User</td>
									<td>User Deleted</td>
									<td>{{ $history->userResponsible()->name }}</td>
									@include('includes.audit_trail')
								</tr>
								@endif
							<?php } else { ?>
								@if($history->fieldName() == 'Password')
									<tr>
										<td>User</td>
										<td>-</td>
										<td>{{ $history->userResponsible()->name }}</td>
										<td>{{ $history->fieldName() }} </td>
										<td>***</td>
										<td>***</td>
										<td>{{ $history->updated_at->format('M j, Y h:i A') }}</td>
									</tr>
								@else
								<tr>
									<td>User</td>
									<td>-</td>
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
