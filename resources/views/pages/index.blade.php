@extends ('app')
@section('header')
	<script src="{{ asset('/sorttable.js') }}"></script>
@endsection
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
								<th width="30%">Title</th>
								<th width="15%">Project Manager</th>
								<th width="15%">Status</th>
								<th width="10%">Color</th>
								<th width="15%">Target Date</th>
								<th width="20%">Last Update</th>
							</tr>
						</thead>
						<tbody>
							
						@foreach ($projects as $project)
							<tr class = "project-row">
								@if (Auth::guest())
									<td><a href="{{ action('ProjectsController@show', [$project->id]) }}">{{ $project['title'] }}</a></td>
								@elseif (Auth::user()->role == 'Project Manager')
									<td><a href="{{ action('ProjectsController@status', [$project->id]) }}">{{ $project['title'] }}</a></td>
								@else
									<td><a href="{{ action('ProjectsController@show', [$project->id]) }}">{{ $project['title'] }}</a></td>
								@endif
								<td align="center">{{ $project['pm'] }} </td>
								<td align="center">{{ $project['status'] }}</td>
								<td align="center">{{ $project ['color'] }} </td>
								<td align="center">{{ $project  ['target_date'] }} </td>
								<td align="center">{{ $project  ['updated_at'] }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</center>
			</div>
		</div>
	</div>
@endsection
@stop