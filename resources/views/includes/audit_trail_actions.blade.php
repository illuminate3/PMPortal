

				<center>
					<table class="etable table-condensed table-hover project-show full sortable wrap">
						<thead>
							<tr>
								<th width="20%">Type</th>
								<th width="20%">Project/User</th>
								<th width="15%">Action</th>
								<th width="20%">Done By</th>
								<th width="25%">Timestamp</th>
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
								<td align="center">{{ $activity['created_at']->format('M j, Y h:i A') }}</td>
								</tr>
							<?php } elseif (($activity['user']->name == $activity['name']) && ($activity['type'] == "User") && ($activity['action'] = "Updated") ){ ?>
							<?php } else { ?>
								<tr class = "project-row">
								<td align="center">{{ $activity['type'] }}</td>
								<td align="center">{{ $activity['name'] }}</td>
								<td align="center">{{ $activity['action'] }}</td>
								<td align="center">{{ $activity['user']->name }}</td>
								<td align="center">{{ $activity['created_at'] ->format('M j, Y h:i A') }}</td>
								</tr>
							<?php } ?>
						@endforeach
						</tbody>
					</table>
				</center>
