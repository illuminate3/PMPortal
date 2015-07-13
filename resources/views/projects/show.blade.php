@extends ('app')
@section('header')
	<script src="{{ asset('/sorttable.js') }}"></script>
@stop
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_show')


	<div class="span9 pull-right">
		<div class="container panel panel-default full ">
			<div class="panel-heading ">
				<table width="100%" class="projectheading">
					<tr>
					<td>{{ $project['title'] }} <small><span class="break">- as of {{ $project['updated_at']->format('M j, Y h:i A') }}</span></small></td>
					<td width="40%" align="right">
						@if (Auth::guest())
						@else
							@if ($project['user_id'] == null)
							@else
								@if ((Auth::user()['id'] == $project['user_id']))
									<span class="break"><a class="add" href="{{ action('ProjectsController@edit', [$project->id] ) }}"> <i class="glyphicon glyphicon-pencil"></i> Edit Project</a>	</span>	
								@else				
								@endif
							@endif
						@endif
						<span class="break"><a class="add" href="{{ action('DeliverablesController@show', [$project->id] ) }}"> <i class="glyphicon glyphicon-check"></i> View Checklist</a></span>
						<span class="break"><a class="add" href="{{ action('ChartsController@show', [$project->id] ) }}"> <i class="glyphicon glyphicon-check"></i> View Org Chart</a></span>
					</td>
				</table>
			</div>

			<div class ="panel-body">
			
			@include('includes.details')

			@include('includes.tables')

			</div>
		</div>
	</div>
</div>

@stop
