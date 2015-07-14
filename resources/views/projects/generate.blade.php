<head>
	<title>{{ $project-> title }} - {{ $project-> updated_at->format('M j, Y h:i A')  }}</title>
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
	
	<style type="text/css">
		.header {
			width: 100%;
		    position: fixed;
		    top: -50px;
		    height: 50px;
			background-color: white;
		    border-bottom: 1px solid black;
		}
		.htitle{
			width: 50%;
			height: 50px;
			left: 10px;
			top:0px;
			position: absolute;
  			padding-top: 25px;
		}
		.himg{
			width: 50%;
			text-align: right;
			position: absolute;
			right: 10px;
			top:0px;
			height: 50px;
			vertical-align: text-bottom;
		}
		.footer {
		    bottom: 0px;
		    width: 100%;
		    position: fixed;
		    text-align: right;
		}
		.pagenum:before {
		    content: counter(page); 
		}
		 @page { margin: 70px; }
			
		.details
		{
			margin-left: 3px;
		}
		.generatetable td
		{
			padding:5px;
		}
		.generate h1{
			font-size: 20px;
			font-family:Tahoma, Geneva, sans-serif;
		}
	</style>
</head>
<body>
	<div class="header">
		<div class="htitle">
			<b>{{ $project-> title }}</b>
		</div>
		<div class="himg">
     		 <img src="img/maybankheader.jpg" width="45%" >
 		</div>
	</div>

	<div class="content generate">
		<h1>{{ $project-> title }}</h1>
		as of {{ $project['updated_at']->format('M j, Y h:i A') }}<br /> <br />
		<table class="table-condensed details"> <tbody>
				<tr>
					<td>CAC: </td>
					<td colspan="3"> {{ $project['cac'] }} </td>
				</tr>
				<tr>

					<td>Project Status: </td>
					<td colspan="3">{{ $project['status'] }} - 
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
				<tr>
					<td> % Done: </td>
					<td colspan="3">{{ $project['percent']}}%</td>
				</tr>

				<tr>
					<td>Rationale: </td>
					<td colspan="3"> {{ $project['rationale'] }} </td>
				</tr>
				

				<tr>
					<td width="20%"> {!! Form::label('target_start', 'Target Start:') !!} </td>
					<td width="30%"> {{ $project['target_start'] ->toFormattedDateString() }} </td>
					<td width="20%"> {!! Form::label('target_start', 'Target End:') !!} </td>
					<td width="30%"> {{ $project['target_end'] ->toFormattedDateString()}}</td>
				</tr>
							
								@if ( $project['actual_start'] ->toFormattedDateString() == 'Nov 30, -0001')
									<?php $actual_start = 'TBA' ?>
								@else
									<?php $actual_start = $project['actual_start']->toFormattedDateString() ?>
								@endif


								@if ( $project['actual_end'] ->toFormattedDateString() == 'Nov 30, -0001' )
									<?php $actual_end = 'TBA' ?>
								@else
									<?php $actual_end = $project['actual_end']->toFormattedDateString() ?>
								@endif
				<tr>
					<td>{!! Form::label('actual_start', 'Actual Start:') !!}</td>																						
					<td>{{ $actual_start}}</td>
					<td>{!! Form::label('actual_end', 'Actual End:') !!}</td>
					<td>{{ $actual_end }}</td>
				</tr>
				<tr>
					<td>Budget: </td>
					<td>{{ $project['budget']}}</td>
					<td>Utilization: </td>
					<td> {{ $project['utilization'] }} </td>
				</tr>

				<tr>
					<td>Target Mandays: </td>
					<td colspan="3">{{ $project['target_mandays'] }}</td>
				</tr>		
				
				<tr>
					<td>Importance: </td>
					<td colspan="3">{{ $project['importance'] }}</td>
				</tr>

				<tr>
					<td>Applicability: </td>
					<td colspan="3">{{ $project-> applicability }}</td>
				</tr>

				<tr>
					<td>Classification: </td>
					<td colspan="3">{{ $project-> confidentiality }}</td>
				</tr>

				<tr>
					<td>Personnel: </td>
					<td colspan="3">
						@foreach($project->users as $user)
							@if ($user == $lastUser)
							{{ $user->name }}
							@else
							{{ $user->name }}, 
							@endif
						@endforeach
					</td>
				</tr>

</tbody> </table>

		<br />

		<b>Milestones </b><br /><br />
		<table class="border full generatetable">
			<thead>
				<tr>
					<th width="40%" class="border">Milestone</th>
					<th width="10% "class="border">Status</th>
					<th width="20%" class="border">Target Date</th>
					<th width="20%" class="border">Actual Date</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($milestones as $milestone)
				<tr>
					<td class = "border">{{ $milestone-> milestone }}</td>
					<td class = "border" align ="center">{{ $milestone-> status }} </td>
					<td class = "border" align ="center">{{ $milestone-> target_date ->toFormattedDateString()}}</td>
					@if ( $milestone -> actual_date ->toFormattedDateString() == 'Nov 30, -0001')
						<?php $actual_date = 'TBA' ?>
					@else
						<?php $actual_date = $milestone->actual_date->toFormattedDateString() ?>
					@endif
					<td class = "border" align ="center">{{ $actual_date}} </td>
				</tr>
			@endforeach
			</tbody>
		</table> <br />

		<b>Last Week's Accomplishments  </b><br /><br />
		<ul>
			@foreach ($accomplishments as $accomplishment)
				<li>{{ $accomplishment-> accomplishment }}</li>
			@endforeach
		</ul> <br />

		<b>Week's Action Items  </b><br /><br />
		<table class="border full generatetable">
			<?php $number = 1 ?>
			<thead>
				<tr>
					<th width="5%"  class="border">#</th>
					<th width="25%"  class="border" width="30%">Action Item</th>
					<th width="10%" class="border">Status</th>
					<th width="15%" class="border">Owner</th>
					<th width="15%" class="border">Target Date</th>
					<th width="30%" class="border" width="30%">Comments</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($actions as $action)
				<tr>
					<td class = "border" align ="center">{{ $number }}</td>
					<td class = "border">{{ $action-> action_item }}</td>
					<td class = "border" align ="center">{{ $action-> status }} </td>
					<td class = "border" align ="center">{{ $action-> owner }}</td>
					<td class = "border" align ="center">{{ $action -> target_date->toFormattedDateString() }} </td>
					<td class = "border">{{ $action -> comment }} </td>
				</tr>
				<?php $number = $number + 1 ?>
			@endforeach
			</tbody>
		</table> <br />

		<b>Issues  </b><br /><br />
		<table class="border full generatetable">
			<?php $number = 1 ?>
			<thead>
				<tr>
					<th width="5%" class="border">#</th>
					<th width="25%" class="border" width="35%">Issue</th>
					<th width="10%" class="border">Status</th>
					<th width="15%" class="border">Severity</th>
					<th width="15%" class="border">Owner</th>
					<th width="30%" class="border" width="35%">Comments</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($issues as $issue)
				<tr>
					<td class = "border" align ="center">{{ $number }}</td>
					<td class = "border">{{ $issue-> issue }}</td>
					<td class = "border" align ="center">{{ $issue-> status }} </td>
					<td class = "border" align ="center">{{ $issue-> severity }}</td>
					<td class = "border" align ="center">{{ $issue -> owner }} </td>
					<td class = "border">{{ $issue -> comment }} </td>
				</tr>
				<?php $number = $number + 1 ?>
			@endforeach
			</tbody>
		</table> <br />

		<b>Risks </b><br /><br />
		<table class="border full generatetable">
			<?php $number = 1 ?>
			<thead>
				<tr>
					<th width="5%"  class="border">#</th>
					<th width="25%" class="border" width="35%">Risk</th>
					<th width="20%" class="border">Impact</th>
					<th width="20%" class="border">Probability</th>
					<th width="30%" class="border" width="35%">Mitigation</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($risks as $risk)
				<tr>
					<td class = "border" align ="center">{{ $number }}</td>
					<td class = "border">{{ $risk-> risk }}</td>
					<td class = "border" align ="center">{{ $risk-> impact }} </td>
					<td class = "border" align ="center">{{ $risk-> probability }}</td>
					<td class = "border">{{ $risk -> mitigation }} </td>
				</tr>
				<?php $number = $number + 1 ?>
			@endforeach
			</tbody>
		</table> <br />

		<b>Expenses </b><br /><br />
		<table class="border full generatetable">
			<?php $number = 1 ?>
			<thead>
				<tr>
					<th width="5%"  class="border">#</th>
					<th width="25%" class="border" width="35%">Item</th>
					<th width="20%" class="border">Amount</th>
					<th width="20%" class="border">Balance</th>
					<th width="30%" class="border" width="35%">Comments</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($expenses as $expense)
				<tr>
					<td class = "border" align ="center">{{ $number }}</td>
					<td class = "border">{{ $expense-> item }}</td>
					<td class = "border" align ="center">{{ $expense-> amount }} </td>
					<td class = "border" align ="center">{{ $expense-> balance }}</td>
					<td class = "border">{{ $expense -> comment }} </td>
				</tr>
				<?php $number = $number + 1 ?>
			@endforeach
			</tbody>
		</table> <br />
	</div>
	<div class="footer">
	    Page <span class="pagenum"></span>
	</div>