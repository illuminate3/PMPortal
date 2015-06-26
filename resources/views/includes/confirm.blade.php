{!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete' ]) !!}
	@if ($project-> status == "Cancelled")
		<button class="btn btn-warning span12 option" data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="right"
			data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-trash" data-btn-ok-class="btn-warning"
			data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to delete project {{$project->title}}?</b></center>">
		<i class="glyphicon glyphicon-trash"></i> Delete Project</button>	
	@else
		{!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete Project', ['type' => 'submit', 'class' => 'btn btn-warning span12 option']) !!}
	@endif
{!! Form::close() !!}