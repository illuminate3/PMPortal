@extends ('app')
@section('header')
	<script src="{{ asset('/sorttable.js') }}"></script>
@endsection
@section('content')
<div class="row-fluid">
	<!--sidebar content-->
	@include('includes.sidebar_show')

	<div class="span9 pull-right">
		<div class="container panel panel-default full">
			<div class="panel-heading">
				{{ $project-> title }} - {{ $project-> updated_at }}
			</div>

			<div class ="panel-body">
			<table class="etable table-condensed table-hover project-show"> <tbody>

				<tr>
					<td class="span3 right">{!! Form::label('target_date', 'Target Date:') !!}</td>
					<td>{{ $project-> target_date }}</td>
				</tr>
				<tr>
					<td class= "span3 right">Project Status: </td>
					<td>{{ $project-> status }} - {{ $project-> color }}</td>
				</tr>
				
				<tr>
					<td class="span3 right">Rationale: </td>
					<td> {{ $project-> rationale }} </td>
				</tr>

				<tr>
					<td class="span3 right">Hardware: </td>
					<td> {{ $project-> hardware }} </td>
				</tr>

				<tr>
					<td class="span3 right">Software: </td>
					<td> {{ $project-> software }} </td>
				</tr>

				<tr>
					<td class="span3 right">Target Mandays: </td>
					<td> {{ $project-> target_mandays }} </td>
				</tr>

				<tr>
					<td class="span3 right">Actual Mandays: </td>
					<td> {{ $project-> actual_mandays }} </td>
				</tr>

			</tbody> </table>


			<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> <th colspan="2"> Milestones: </th> </tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show sortable full">
						<thead>
							<tr>
							<th width="30%">Milestone</th>
							<th width="10%">Status</th>
							<th width="15%">Target Date</th>
							<th width="15%">Actual Date</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($milestones as $milestone)
							<tr>
							<td>{{ $milestone-> milestone }}</td>
							<td align="center">{{ $milestone-> status }} </td>
							<td align="center">{{ $milestone-> target_date }}</td>
							<td align="center">{{ $milestone -> actual_date }} </td>
							</tr>
						@endforeach
						</tbody>
					</table>
			</tbody> </table>


			<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> <th colspan="2"> Last Week's Accomplishments: </th> </tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show"> <tbody>
					@foreach ($accomplishments as $accomplishment)
						<tr><td>{{ $accomplishment-> accomplishment }}</td></tr>
					@endforeach
			</tbody> </table>


			<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> <th colspan="2"> Week's Action Items: </th> </tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show sortable full">
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
							<td align="center">{{ $action -> target_date }} </td>
							<td>{{ $action -> comment }} </td>
						</tr>
						<?php $number = $number + 1 ?>
					@endforeach
					</tbody>
			</table>


			<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> <th colspan="2"> Issues: </th> </tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show sortable full">
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
						</tr>
						<?php $number = $number + 1 ?>
					@endforeach
					</tbody>
			</table>


			<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> <th colspan="2"> Risks: </th> </tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show sortable full">
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
						</tr>
						<?php $number = $number + 1 ?>
					@endforeach
					</tbody>
			</table>

			
			<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> <th colspan="2"> Expenses: </th> </tr>
			</tbody> </table>
			<table class="etable table-condensed table-hover project-show sortable full">
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
						</tr>
						<?php $number = $number + 1 ?>
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@stop