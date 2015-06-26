@extends ('app')
@section('content')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_home')

		<div class="span9 pull-right">
			<div class ="well project-table">
				<center>
					<table class="sortable full">
						<thead>
							<tr>
								<th width="10%">CAC</th>
								<th width="15%">Title</th>
								<th width="10%">PM</th>								
								<th width="13%">Status</th>
								<th width="7%">% Done</th>
								<th width="5%">Color</th>										
								<th width="10%">Target Start</th>
								<th width="10%">Target End</th>											
								<th width="15%">Last Update</th>
							</tr>
						</thead>
						<tbody>
							
						@foreach ($projects as $project)
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
						@endforeach
						</tbody>
					</table>
				</center>
			</div>
		</div>
	</div>
@stop