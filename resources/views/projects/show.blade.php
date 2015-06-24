@extends ('app')
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_show')

	<div class="span9 pull-right">
		<div class="container panel panel-default full">
			<div class="panel-heading">
					{{ $project['title'] }} - as of {{ $project['updated_at']->format('F j h:i A') }}
					
					
					<div class = "pull-right">
						@if (Auth::user()['id'] == $project['user_id'])
						<a class="add" href="{{ action('ProjectsController@edit', [$project->id] ) }}"> <i class="glyphicon glyphicon-pencil"></i> Edit Project</a>						
						@endif
						<a class="add" href="{{ action('DeliverablesController@show', [$project->id] ) }}"> <i class="glyphicon glyphicon-check"></i> View Checklist</a>
					</div>
					
			</div>

			<div class ="panel-body">
			
			@include('includes.details')

			@include('includes.tables')

			</div>
		</div>
	</div>
</div>

@stop
