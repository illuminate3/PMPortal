@extends ('app')
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_show')

		<div class="span9 pull-right">
			<div class="container panel panel-default full">
				<div class="panel-heading">
					Edit Project
				</div>
				{!! Form::model($project, ['method' => 'PATCH', 'action' => ['ProjectsController@update', $project->id]]) !!}
					<div class="panel-body">
						<table class="table-condensed table-hover"> <tbody>
							<tr>
								<td class="span3 right"> {!! Form::label('title', 'Title:')!!} </td>
								<td> {!! Form::text('title', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('manager', 'Project Manager:') !!} </td>
								<td> <select class="span5" name="user_id" value="{{ old('user_id') }}">
									@foreach ($managers as $manager)
										<option value= {{ $manager-> id }} <?php if($project->user_id == $manager->id) {echo("selected");} ?> > {{ $manager-> name }}</option>
									@endforeach
								</select> </td>
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('target_date', 'Target Date:') !!}</td>
								<td><input type="date" name="target_date" value="{{ old('custom_date', $project->target_date->format('Y-m-d')) }}"></td>
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('target_mandays', 'Target Mandays:') !!}</td>
								<td>{!! Form::input('number','target_mandays',null,['class' => 'span5']) !!}</td>
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('actual_mandays', 'Actual Mandays:') !!}</td>
								<td>{!! Form::input('number','actual_mandays',null,['class' => 'span5']) !!}</td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('hardware', 'Hardware:')!!} </td>
								<td> {!! Form::text('hardware', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('software', 'Software:')!!} </td>
								<td> {!! Form::text('software', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
							<td class= "span3 right">{!! Form::label('project_status', 'Project Status:') !!} </td>
							<td>
								<select class="span5" name="status" width="50%" value={{ old('status') }}>
									<option value= "Not Yet Started" <?php if($project->status == 'Not Yet Started') {echo("selected");} ?>> 
										Not Yet Started</option>
									<option value= "In Progress" <?php if($project->status == 'In Progress') {echo("selected");} ?>> 
										In Progress</option>
									<option value= "On Hold" <?php if($project->status == 'On Hold') {echo("selected");} ?>> 
										On Hold</option>
									<option value= "Completed" <?php if($project->status == 'Completed') {echo("selected");} ?>> 
										Completed</option>
									<option value= "Cancelled" <?php if($project->status == 'Cancelled') {echo("selected");} ?>> 
										Cancelled</option>
								</select> -
								<select class="span5" width="50%" name="color" value={{ old('color') }}>
									<option value= "Red" <?php if($project->color == 'Red') {echo("selected");} ?>> 
										Red</option>
									<option value= "Amber" <?php if($project->color == 'Amber') {echo("selected");} ?>> 
										Amber</option>
									<option value= "Green" <?php if($project->color == 'Green') {echo("selected");} ?>> 
										Green</option>
								</select>
							</td>
							</tr>
					
							<tr>
								<td class="span3 right">{!! Form::label('rationale', 'Rationale:') !!} </td>
								<td> {!! Form::textarea('rationale', null, ['class' => 'span9']) !!} </td>
							</tr>
								</tbody> </table>

						<div class = "submit">
							{!! Form::submit('Submit', ['class' => 'btn btn-warning']) !!}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
@stop