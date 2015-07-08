<table class="etable table-condensed table-hover project-show table-head" > <tbody>
				<tr> 
					<th colspan="2"> Milestones: </th>
					@if (Auth::guest())
					@else
						@if ($project->user_id == null)
						@else
							@if (Auth::user()->id == $project->user_id)
								<th class="pull-right add"><a href="{{ action('MilestonesController@create', [$project->id] ) }}" class="add" title="Add Milestone"> <i class="glyphicon glyphicon-plus"></i></a></th> 
							@endif
						@endif
					@endif
					
				</tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show full">
						<thead>
							<tr>
							<th width="40%">Milestone</th>
							<th width="16%">Status</th>
							<th width="20%">Target Date</th>
							<th width="20%">Actual Date</th>
							<th width="2%"> </th>
							<th width="2%"> </th>
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
							@else
								@if ($project->user_id == null)
								@else
									@if (Auth::user()->id == $project->user_id)
									<td class="right"><a href="{{ action('MilestonesController@edit', [$milestone->project_id, $milestone->id] ) }}" title="Edit milestone"><img src="{{ asset('img/glyphicons-31-pencil.png')}}" style="width:10px;min-width:10px;" > </img></a></td>
									<td class="right">
										{!! Form::open(['route' => ['milestones.destroy', $milestone->project_id, $milestone->id], 'method' => 'delete', 'class' => 'delete' ]) !!}
     									<input data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="top"
							data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-trash" data-btn-ok-class="btn-warning"
							data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to delete this milestone?</b></center>" type="image" name="image" src="{{ asset('img/glyphicons-17-bin.png')}}" style="width:10px;min-width:10px;" >
                                        
		 								{!! Form::close() !!}
		 							</td>
									@endif
								@endif
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
					@else
						@if ($project->user_id == null)
						@else
							@if (Auth::user()->id == $project->user_id)
							<th class="pull-right add">	<a class="add" href="{{ action('AccomplishmentsController@create', [$project->id] ) }}" title="Add Accomplishment"> <i class="glyphicon glyphicon-plus"></i></a></th>
							@endif
						@endif
					@endif
				</tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show"> <tbody>
					@foreach ($accomplishments as $accomplishment)
						<tr>
							<td class="span11">
								{{ $accomplishment-> accomplishment }} |
							</td>
								@if (Auth::guest())
								@else
									@if ($project->user_id == null)
									@else
										@if (Auth::user()->id == $project->user_id)
										<td class="span1 right">
										<a href="{{ action('AccomplishmentsController@edit', [$accomplishment->project_id, $accomplishment->id] ) }}" title="Edit accomplishment"><img src="{{ asset('img/glyphicons-31-pencil.png')}}" style="width:10px;min-width:10px;" > </img></a>
										</td>
										<td class="span1">
											{!! Form::open(['route' => ['accomplishments.destroy', $accomplishment->project_id, $accomplishment->id], 'method' => 'delete', 'class' => 'delete']) !!}
	     									<input data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="top"
							data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-trash" data-btn-ok-class="btn-warning"
							data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to delete this accomplishment?</b></center>" type="image" name="image" src="{{ asset('img/glyphicons-17-bin.png')}}" style="width:10px;min-width:10px;" >
                                        
	     									{!! Form::close() !!}
		 								</td>
										@endif
									@endif
								@endif
							
						</tr>
					@endforeach
			</tbody> </table>


			<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> 
					<th colspan="2"> Week's Action Items: </th> 
					@if (Auth::guest())
					@else
						@if ($project->user_id == null)
						@else
							@if (Auth::user()->id == $project->user_id)
							<th class="pull-right add"><a class="add" href="{{ action('ActionsController@create', [$project->id] ) }}"> <i class="glyphicon glyphicon-plus" title="Add Action Item"></i> </a> </th> 
							@endif
						@endif
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
							<th width="26%">Comments</th>
							<th width="2%"></th>
							<th width="2%"></th>
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
							@else
								@if ($project->user_id == null)
								@else
									@if (Auth::user()->id == $project->user_id)
									<td><a href="{{ action('ActionsController@edit', [$action->project_id, $action->id] ) }}" title="Edit action"><img src="{{ asset('img/glyphicons-31-pencil.png')}}" style="width:10px;min-width:10px;" > </img></a></td>
									<td>
										{!! Form::open(['route' => ['actions.destroy', $action->project_id, $action->id], 'method' => 'delete', 'class' => 'delete' ]) !!}
     									<input data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="top"
							data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-trash" data-btn-ok-class="btn-warning"
							data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to delete this action?</b></center>" type="image" name="image" src="{{ asset('img/glyphicons-17-bin.png')}}" style="width:10px;min-width:10px;" >
                                        
		 								{!! Form::close() !!}
	 								</td>
									@endif
								@endif
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
					@else
						@if ($project->user_id == null)
						@else
							@if (Auth::user()->id == $project->user_id)
							<th class="pull-right add"><a class="add" href="{{ action('IssuesController@create', [$project->id] ) }}" title="Add Issue"> <i class="glyphicon glyphicon-plus"></i></a></th> 
							@endif
						@endif
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
							<th width="26%">Comments</th>
							<th width="2%"></th>
							<th width="2%"></th>
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
							@else
								@if ($project->user_id == null)
								@else
									@if (Auth::user()->id == $project->user_id)
									<td><a href="{{ action('IssuesController@edit', [$issue->project_id, $issue->id] ) }}" title="Edit issue"><img src="{{ asset('img/glyphicons-31-pencil.png')}}" style="width:10px;min-width:10px;" > </img></a></td>
									<td>
										{!! Form::open(['route' => ['issues.destroy', $issue->project_id, $issue->id], 'method' => 'delete', 'class' => 'delete' ]) !!}
     									<input data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="top"
							data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-trash" data-btn-ok-class="btn-warning"
							data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to delete this issue?</b></center>" type="image" name="image" src="{{ asset('img/glyphicons-17-bin.png')}}" style="width:10px;min-width:10px;" >
                                        
		 								{!! Form::close() !!}
	 								</td>
									@endif
								@endif
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
					@else
						@if ($project->user_id == null)
						@else
							@if (Auth::user()->id == $project->user_id)
							<th class="pull-right add"><a class="add" href="{{ action('RisksController@create', [$project->id] ) }}" title="Add Risk"> <i class="glyphicon glyphicon-plus"></i></a></th>
							@endif
						@endif
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
							<th width="26%">Mitigation</th>
							<th width="2%"></th>
							<th width="2%"></th>
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
							@else
								@if ($project->user_id == null)
								@else
									@if (Auth::user()->id == $project->user_id)
									<td><a href="{{ action('RisksController@edit', [$risk->project_id, $risk->id] ) }}" title="Edit risk"><img src="{{ asset('img/glyphicons-31-pencil.png')}}" style="width:10px;min-width:10px;" > </img></a></td>
									<td>
										{!! Form::open(['route' => ['risks.destroy', $risk->project_id, $risk->id], 'method' => 'delete', 'class' => 'delete' ]) !!}
     									<input data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="top"
							data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-trash" data-btn-ok-class="btn-warning"
							data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to delete this risk?</b></center>" type="image" name="image" src="{{ asset('img/glyphicons-17-bin.png')}}" style="width:10px;min-width:10px;" >
                                        
		 								{!! Form::close() !!}
	 								</td>
									@endif
								@endif
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
					@else
						@if ($project->user_id == null)
						@else
							@if (Auth::user()->id == $project->user_id)
							<th class="pull-right add"><a class="add" href="{{ action('ExpensesController@create', [$project->id] ) }}" title="Add Expense"> <i class="glyphicon glyphicon-plus"></i></a>  </th>
							@endif
						@endif
					@endif
				</tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show full">
				<?php $number = 1 ?>
					<thead>
						<tr>
							<th width="5%">#</th>
							<th width="36%">Item</th>
							<th width="20%">Amount</th>
							<th width="20%">Balance</th>
							<th width="15%">Comments</th>
							<th width="2%"></th>
							<th width="2%"></th>
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
							@else
								@if ($project->user_id == null)
								@else
									@if (Auth::user()->id == $project->user_id)
									<td><a href="{{ action('ExpensesController@edit', [$expense->project_id, $expense->id] ) }}" title="Edit expense"><img src="{{ asset('img/glyphicons-31-pencil.png')}}" style="width:10px;min-width:10px;" > </img></a></td>
									<td>
										{!! Form::open(['route' => ['expenses.destroy', $expense->project_id, $expense->id], 'method' => 'delete', 'class' => 'delete' ]) !!}
     									<input data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="top"
							data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-trash" data-btn-ok-class="btn-warning"
							data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to delete this expense?</b></center>" type="image" name="image" src="{{ asset('img/glyphicons-17-bin.png')}}" style="width:10px;min-width:10px;" >
                                        
		 								{!! Form::close() !!}
	 								</td>
									@endif
								@endif
							@endif
						</tr>
						<?php $number = $number + 1 ?>
					@endforeach
					</tbody>
				</table>