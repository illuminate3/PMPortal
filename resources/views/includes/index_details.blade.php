<tr class = "project-row">
										<td align="center">{{ $project['cac'] }}</td>
										<td><a href="{{ action('ProjectsController@show', [$project->id]) }}">{{ $project['title'] }}</a></td>
										<td align="center">{{ $project['pm'] }} </td>
										<td align="center">{{ $project['status'] }}</td>
										<td align="center">{{ $project['percent']}}%</td>
										<td align="center">
											@if ($project-> color == "Green")
												<img src="{{ asset('img/green.png') }}" class="color-img">
											@elseif ($project-> color == "Amber")
												<img src="{{ asset('img/amber.png') }}" class="color-img">
											@elseif ($project-> color == "Red")
												<img src="{{ asset('img/red.png') }}" class="color-img">
											@elseif ($project-> color == "Blue")
												<img src="{{ asset('img/blue.png') }}" class="color-img">
											@endif
										 </td>
										<td align="center">{{ $project -> target_start->toFormattedDateString() }} </td>
										<td align="center">{{ $project -> target_end->toFormattedDateString() }} </td>											
										<td align="center">{{ $project -> updated_at->format('F j h:i A') }}</td>
									</tr>