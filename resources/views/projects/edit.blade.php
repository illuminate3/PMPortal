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
						<table class="table-condensed" style="margin-left:25px;"> <tbody>
							<tr>
								<td width="15%" > {!! Form::label('cac', '*CAC No.:')!!} </td>
								<td colspan="3"> {!! Form::text('cac', null, ['class' => 'span4']) !!} </td>
							</tr>
							<tr>
								<td width="15%"> {!! Form::label('title', '*Title:')!!} </td>
								<td colspan="3"> {!! Form::text('title', null, ['class' => 'span7']) !!} </td>
							</tr>
							<tr>
								<td width="15%"> {!! Form::label('pm', '*Project Manager:') !!} </td>
								<td colspan="3"> <select class="span4" name="pm" value="{{ old('name') }}">
									@foreach ($managers as $manager)
										<option value= {{ $manager -> id }} <?php if($project->pm == $manager->name) {echo("selected");} ?> > {{ $manager-> name }}</option>
									@endforeach
								</select> </td>
							</tr>

							<tr>
								<td width="15%"> {!! Form::label('users', 'Personnel:') !!} </td>

								<td colspan="3"> <select id="projectusers" name="users[]" class="span7" value="{{ old('users') }}" multiple>
									@foreach ($users as $user)
										<option value= {{ $user->id }} <?php if(in_array($user->name,$projectusers)) {echo("selected");} ?> >
											{{ $user->name }}
										</option>

									@endforeach
								</select> </td>
							</tr>

							<tr>
								<td width="15%">{!! Form::label('percent', 'Percent:') !!}</td>
								<td colspan="3">{!! Form::input('number','percent',null,['class' => 'span2']) !!}</td>
							</tr>
							<tr>
								<td width="15%">{!! Form::label('target_start', '*Target Start:') !!}</td>
								<td><input type="date" name="target_start" value="{{ old('custom_date', $project->target_start->format('Y-m-d')) }}"></td>

								<td width="15%">{!! Form::label('actual_start', 'Actual Start:') !!}</td>
								<td><input type="date" name="actual_start" value="{{ old('custom_date', $project->actual_start->format('Y-m-d')) }}"></td>
							</tr>
							<tr>
								<td width="15%">{!! Form::label('target_end', '*Target End:') !!}</td>
								<td><input type="date" name="target_end" value="{{ old('custom_date', $project->target_end->format('Y-m-d')) }}"></td>
								<td width="15%">{!! Form::label('actual_end', 'Actual End:') !!}</td>
								<td><input type="date" name="actual_end" value="{{ old('custom_date', $project->actual_end->format('Y-m-d')) }}"></td>
							</tr>
							<tr>
								<td width="15%">{!! Form::label('target_mandays', '*Target Mandays:') !!}</td>
								<td>{!! Form::input('number','target_mandays',null) !!}</td>
								<td width="15%">{!! Form::label('actual_mandays', 'Actual Mandays:') !!}</td>
								<td>{!! Form::input('number','actual_mandays',null) !!}</td>
							</tr>
							<tr>
								<td width="15%">{!! Form::label('budget', '*Budget:') !!}</td>
								<td>{!! Form::input('number','budget',null) !!}</td>
								<td width="15%">{!! Form::label('utilization', 'Utilization:') !!}</td>
								<td>{!! Form::input('number','utilization',null) !!}</td>
							</tr>

							<tr>
								<td width="15%"> {!! Form::label('confidentiality', '*Classification:') !!} </td>
								<td colspan="3"> <select class="span5" name="confidentiality" value="{{ old('confidentiality') }}">
									<option value= "Confidential" <?php if($project->confidentiality == 'Confidential') {echo("selected");} ?>> 
										Confidential</option>
									<option value= "Public" <?php if($project->confidentiality == 'Public') {echo("selected");} ?>> 
										Public</option>
								</select> </td>
							</tr>

							<tr>
								<td width="15%"> {!! Form::label('applicability', '*Applicability:') !!} </td>
								<td colspan="3"> <select class="span5" style="width: 325px;"name="applicability" value="{{ old('applicability') }}">
									<option value= "New or Replacement of IT Solution" <?php if($project->applicability == 'New or Replacement of IT Solution') {echo("selected");} ?>> 
										New or Replacement of IT Solution</option>
									<option value= "Enhancement or Application System Upgrade" <?php if($project->applicability == 'Enhancement or Application System Upgrade') {echo("selected");} ?>> 
										Enhancement or Application System Upgrade</option>
									<option value= "IT Infrastructure" <?php if($project->applicability == 'IT Infrastructure') {echo("selected");} ?>> 
										IT Infrastructure</option>
								</select> </td>
							</tr>
							<tr>
								<td width="15%"> {!! Form::label('hardware', 'Hardware:')!!} </td>
								<td colspan="3"> {!! Form::text('hardware', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
								<td width="15%"> {!! Form::label('software', 'Software:')!!} </td>
								<td colspan="3"> {!! Form::text('software', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
							<td width="15%">{!! Form::label('project_status', '*Project Status:') !!} </td>
							<td colspan="3">
								<select class="span3" name="status" width="50%" value={{ old('status') }}>
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
								<select class="span2" width="50%" name="color" value={{ old('color') }}>
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
								<td width="15%">{!! Form::label('rationale', 'Rationale:') !!} </td>
								<td colspan="3"> {!! Form::textarea('rationale', null, ['class' => 'span7']) !!} </td>
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
@stop
