<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> 
					<th colspan="2"> Milestones: </th>
					@if (Auth::guest())
					@elseif (Auth::user()->role == 'Project Manager')
						<th class="pull-right add"><a href="{{ action('MilestonesController@create', [$project->id] ) }}" class="add"> <i class="glyphicon glyphicon-plus"></i> Add Milestone</a></th> 
					@else
					@endif
					
				</tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show full">
						<thead>
							<tr>
							<th width="35%">Milestone</th>
							<th width="15%">Status</th>
							<th width="20%">Target Date</th>
							<th width="20%">Actual Date</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($milestones as $milestone)
							<tr>
							<td>{{ $milestone-> milestone }}</td>
							<td align="center">{{ $milestone-> status }} </td>
							<td align="center">{{ $milestone-> target_date ->toFormattedDateString()}}</td>
							

							@if ($milestone['actual_date']->toFormattedDateString() == 'Nov 30, -0001')
								<?php $actual_date = 'TBA' ?>
							@else
								<?php $actual_date = $milestone['actual_date']->toFormattedDateString() ?>
							@endif
							


							<td align="center">{{ $actual_date}}</td>
							@if (Auth::guest())
							@elseif (Auth::user()->role == 'Project Manager')
								<td><a href="{{ action('MilestonesController@edit', [$milestone->id] ) }}"> Edit</a></td>
							@else
							@endif
							</tr>
						@endforeach
						</tbody>
					</table>
			</tbody> </table>


			<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> 
					<th colspan="2"> Last Week's Accomplishments: </th> 
					@if (Auth::guest())
					@elseif (Auth::user()->role == 'Project Manager')
						<th class="pull-right add">	<a class="add" href="{{ action('AccomplishmentsController@create', [$project->id] ) }}"> <i class="glyphicon glyphicon-plus"></i> Add Accomplishment</a></th>
					@else
					@endif
				</tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show"> <tbody>
					@foreach ($accomplishments as $accomplishment)
						<tr>
							<td>
								{{ $accomplishment-> accomplishment }} |
								@if (Auth::guest())
								@elseif (Auth::user()->role == 'Project Manager')
									<a href="{{ action('AccomplishmentsController@edit', [$accomplishment->id] ) }}"> Edit</a>
								@else
								@endif
							</td>
						</tr>
					@endforeach
			</tbody> </table>


			<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> 
					<th colspan="2"> Week's Action Items: </th> 
					@if (Auth::guest())
					@elseif (Auth::user()->role == 'Project Manager')
						<th class="pull-right add"><a class="add" href="{{ action('ActionsController@create', [$project->id] ) }}"> <i class="glyphicon glyphicon-plus"></i> Add Action Item</a> </th> 
					@else
					@endif
				</tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show full">
					<?php $number = 1 ?>
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="25%">Action Item</th>
							<th width="10%">Status</th>
							<th width="15%">Owner</th>
							<th width="15%">Target Date</th>
							<th width="30%">Comments</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($actions as $action)
						<tr>
							<td align="center">{{ $number }}</td>
							<td>{{ $action-> action_item }}</td>
							<td align="center">{{ $action-> status }} </td>
							<td align="center">{{ $action-> owner }}</td>
							<td align="center">{{ $action -> target_date ->toFormattedDateString()}} </td>
							<td>{{ $action -> comment }} </td>
							@if (Auth::guest())
								@elseif (Auth::user()->role == 'Project Manager')
									<td><a href="{{ action('ActionsController@edit', [$action->id] ) }}"> Edit</a></td>
								@else
								@endif
						</tr>
						<?php $number = $number + 1 ?>
					@endforeach
					</tbody>
			</table>


			<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> 
					<th colspan="2"> Issues: </th> 
					@if (Auth::guest())
					@elseif (Auth::user()->role == 'Project Manager')
						<th class="pull-right add"><a class="add" href="{{ action('IssuesController@create', [$project->id] ) }}"> <i class="glyphicon glyphicon-plus"></i> Add Issue</a></th> 
					@else
					@endif
				</tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show full">
				<?php $number = 1 ?>
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="25%">Issue</th>
							<th width="10%">Status</th>
							<th width="15%">Severity</th>
							<th width="15%">Owner</th>
							<th width="30%">Comments</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($issues as $issue)
						<tr>
							<td align="center">{{ $number }}</td>
							<td>{{ $issue-> issue }}</td>
							<td align="center">{{ $issue-> status }} </td>
							<td align="center">{{ $issue-> severity }}</td>
							<td align="center">{{ $issue -> owner }} </td>
							<td>{{ $issue -> comment }} </td>
							@if (Auth::guest())
								@elseif (Auth::user()->role == 'Project Manager')
									<td><a href="{{ action('IssuesController@edit', [$issue->id] ) }}"> Edit</a></td>
								@else
							@endif
						</tr>
						<?php $number = $number + 1 ?>
					@endforeach
					</tbody>
			</table>


			<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> 
					<th colspan="2"> Risks: </th>
					@if (Auth::guest())
					@elseif (Auth::user()->role == 'Project Manager')
						<th class="pull-right add"><a class="add" href="{{ action('RisksController@create', [$project->id] ) }}"> <i class="glyphicon glyphicon-plus"></i> Add Risk</a></th>
					@else
					@endif
				</tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show full">
				<?php $number = 1 ?>
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="25%">Risk</th>
							<th width="20%">Impact</th>
							<th width="20%">Probability</th>
							<th width="30%">Mitigation</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($risks as $risk)
						<tr>
							<td align="center">{{ $number }}</td>
							<td>{{ $risk-> risk }}</td>
							<td align="center">{{ $risk-> impact }} </td>
							<td align="center">{{ $risk-> probability }}</td>
							<td>{{ $risk -> mitigation }} </td>
							@if (Auth::guest())
								@elseif (Auth::user()->role == 'Project Manager')
									<td><a href="{{ action('RisksController@edit', [$risk->id] ) }}"> Edit</a></td>
								@else
								@endif
						</tr>
						<?php $number = $number + 1 ?>
					@endforeach
					</tbody>
			</table>

			
			<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> 
					<th colspan="2"> Expenses: </th> 
					@if (Auth::guest())
					@elseif (Auth::user()->role == 'Project Manager')
						<th class="pull-right add"><a class="add" href="{{ action('ExpensesController@create', [$project->id] ) }}"> <i class="glyphicon glyphicon-plus"></i> Add Expense</a>  </th>
					@else
					@endif
				</tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show full">
				<?php $number = 1 ?>
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="25%">Item</th>
							<th width="20%">Amount</th>
							<th width="20%">Balance</th>
							<th width="35%">Comments</th>
						</tr>
					</thead>
					<tbody>
					@foreach ($expenses as $expense)
						<tr>
							<td align="center">{{ $number }}</td>
							<td>{{ $expense-> item }}</td>
							<td align="center">{{ $expense-> amount }} </td>
							<td align="center">{{ $expense-> balance }}</td>
							<td>{{ $expense -> comment }} </td>
							@if (Auth::guest())
								@elseif (Auth::user()->role == 'Project Manager')
									<td><a href="{{ action('ExpensesController@edit', [$expense->id] ) }}"> Edit</a></td>
								@else
								@endif
						</tr>
						<?php $number = $number + 1 ?>
					@endforeach
					</tbody>
				</table>