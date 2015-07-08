@extends ('app')
@section('header')
@stop
@section('content')
<div class="row-fluid">
	<!--sidebar content-->
	@include('includes.sidebar_show')

	<div class="span9 pull-right">
		<div class="container panel panel-default full">
			<div class="panel-heading">
				{{ $project-> title }} - SDLC Deliverables Checklist
			</div>
			<div class ="panel-body">
			{!! Form::model($deliverables, ['method' => 'PATCH', 'action' => ['DeliverablesController@update', $project->id]]) !!}

				<table class="etable table-condensed table-hover project-show table-head"> <tbody>
					<tr> <th colspan="2"> Planning Stage </th> </tr>
				</tbody> </table>
				<table class="etable table-condensed table-hover project-show sortable full">
					<thead>
						<tr>
							<th width="5%">Template Number</th>
							<th width="5%">Submitted</th>
							<th width="15%">Activities</th>
							<th width="25%">Deliverables</th>
							<th width="10%">{{ $project->applicability}}</th>
							<th width="15%">In-charge</td>
							<th width="25%">Required with Condition</th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 1; $i < 13; $i++)
						<?php $deliverable = $deliverables[$i-1] ?>
						<tr>
							<td align = "center"> {{ $i }} </td>
							<td align = "center"> <input name="submit{{ $i }}" type="checkbox" value="1" <?php if($deliverable->submitted == '1') {echo("checked");} ?>> </td>	
							@if ($i == 1)
								<td align = "center" rowspan="3">Initiate Project</td>
							@elseif ($i == 4)
								<td align = "center" rowspan="3">Establish Project Controls</td>
							@elseif ($i == 7)
								<td align = "center" rowspan="6">Conduct Project Kick-off Meeting</td>
							@endif
							<td>{{ $deliverable->deliverable }}</td>
							<td align = "center">
								<select name="required{{ $i }}" style="width: 70px;" value={{ old('status') }}>
									<option value= "-" <?php if($deliverable->required == '-') {echo("selected");} ?>> 
										- </option>
									<option value= "M" <?php if($deliverable->required == 'M') {echo("selected");} ?>> 
										M</option>
									<option value= "O" <?php if($deliverable->required == 'O') {echo("selected");} ?>> 
										O</option>
									<option value= "N/A" <?php if($deliverable->required == 'N/A') {echo("selected");} ?>> 
										N/A</option>
								</td>
							<td align = "center"> {!! Form::text("incharge$i", null) !!} </td>
							<td>{!! Form::text("condition$i", null) !!}</td>
						</tr>
						@endfor
					</tbody>
				</table>

				<table class="etable table-condensed table-hover project-show table-head"> <tbody>
					<tr> <th colspan="2"> Analysis & Design Stage </th> </tr>
				</tbody> </table>
				<table class="etable table-condensed table-hover project-show sortable full">
					<thead>
						<tr>
							<th width="5%">Template Number</th>
							<th width="5%">Submitted</th>
							<th width="15%">Activities</th>
							<th width="25%">Deliverables</th>
							<th width="10%">{{ $project->applicability}}</th>
							<th width="15%">In-charge</td>
							<th width="25%">Required with Condition</th>
							
						</tr>
					</thead>
					<tbody>
						@for ($i = 13; $i < 24; $i++)
						<?php $deliverable = $deliverables[$i-1] ?>
						<tr>
							<td align = "center"> {{ $i }} </td>
							<td align = "center"> <input name="submit{{ $i }}" type="checkbox" value="1" <?php if($deliverable->submitted == '1') {echo("checked");} ?>> </td>	
							@if ($i == 13)
								<td align = "center" rowspan="2">Develop and Review Business Requirements</td>
							@elseif ($i == 15)
								<td align = "center" rowspan="3">Develop and Review Functional Specifications</td>
							@elseif ($i == 18)
								<td align = "center">Develop and Review Solution Architecture (Logical)</td>
							@elseif ($i == 19)
								<td align = "center" rowspan="5">Develop and Review Technical Specifications</td>
							@endif
							<td>{{ $deliverable->deliverable }}</td>
							<td align = "center">
								<select name="required{{ $i }}" style="width: 70px;" value={{ old('status') }}>
									<option value= "-" <?php if($deliverable->required == '-') {echo("selected");} ?>> 
										- </option>
									<option value= "M" <?php if($deliverable->required == 'M') {echo("selected");} ?>> 
										M</option>
									<option value= "O" <?php if($deliverable->required == 'O') {echo("selected");} ?>> 
										O</option>
									<option value= "N/A" <?php if($deliverable->required == 'N/A') {echo("selected");} ?>> 
										N/A</option>
								</td>
							<td align = "center"> {!! Form::text("incharge$i", null, ['class' => 'width90']) !!} </td>
							<td>{!! Form::text("condition$i", null, ['class' => 'width90']) !!}</td>
						</tr>
						@endfor
					</tbody>
				</table>

				<table class="etable table-condensed table-hover project-show table-head"> <tbody>
					<tr> <th colspan="2"> Build & Integrate Stage </th> </tr>
				</tbody> </table>
				<table class="etable table-condensed table-hover project-show sortable full">
					<thead>
						<tr>
							<th width="5%">Template Number</th>
							<th width="5%">Submitted</th>
							<th width="15%">Activities</th>
							<th width="25%">Deliverables</th>
							<th width="10%">{{ $project->applicability}}</th>
							<th width="15%">In-charge</td>
							<th width="25%">Required with Condition</th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 24; $i < 26; $i++)
						<?php $deliverable = $deliverables[$i-1] ?>
						<tr>
							<td align = "center"> {{ $i }} </td>
							<td align = "center"> <input name="submit{{ $i }}" type="checkbox" value="1" <?php if($deliverable->submitted == '1') {echo("checked");} ?>> </td>	
							@if ($i == 24)
								<td align = "center">Perform Unit Testing</td>
							@elseif ($i == 25)
								<td align = "center">Perform Source Code Review</td>
							@endif
							<td>{{ $deliverable->deliverable }}</td>
							<td align = "center">
								<select name="required{{ $i }}" style="width: 70px;" value={{ old('status') }}>
									<option value= "-" <?php if($deliverable->required == '-') {echo("selected");} ?>> 
										- </option>
									<option value= "M" <?php if($deliverable->required == 'M') {echo("selected");} ?>> 
										M</option>
									<option value= "O" <?php if($deliverable->required == 'O') {echo("selected");} ?>> 
										O</option>
									<option value= "N/A" <?php if($deliverable->required == 'N/A') {echo("selected");} ?>> 
										N/A</option>
								</td>
							<td align = "center"> {!! Form::text("incharge$i", null, ['class' => 'width90']) !!} </td>
							<td>{!! Form::text("condition$i", null, ['class' => 'width90']) !!}</td>
						</tr>
						@endfor
					</tbody>
				</table>

				<table class="etable table-condensed table-hover project-show table-head"> <tbody>
					<tr> <th colspan="2"> Testing Stage </th> </tr>
				</tbody> </table>
				<table class="etable table-condensed table-hover project-show sortable full">
					<thead>
						<tr>
							<th width="5%">Template Number</th>
							<th width="5%">Submitted</th>
							<th width="15%">Activities</th>
							<th width="25%">Deliverables</th>
							<th width="10%">{{ $project->applicability}}</th>
							<th width="15%">In-charge</td>
							<th width="25%">Required with Condition</th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 26; $i < 40; $i++)
						<?php $deliverable = $deliverables[$i-1] ?>
						<tr>
							<td align = "center"> {{ $i }} </td>
							<td align = "center"> <input name="submit{{ $i }}" type="checkbox" value="1" <?php if($deliverable->submitted == '1') {echo("checked");} ?>> </td>	
							@if ($i == 26)
								<td align = "center" rowspan="5">Plan and Perform IT</td>
							@elseif ($i == 31)
								<td align = "center" rowspan="7">Plan and Perform UAT</td>
							@elseif ($i == 38)
								<td align = "center" rowspan="2">Manage Requirement Change</td>
							@endif
							<td>{{ $deliverable->deliverable }}</td>
							<td align = "center">
								<select name="required{{ $i }}" style="width: 70px;" value={{ old('status') }}>
									<option value= "-" <?php if($deliverable->required == '-') {echo("selected");} ?>> 
										- </option>
									<option value= "M" <?php if($deliverable->required == 'M') {echo("selected");} ?>> 
										M</option>
									<option value= "O" <?php if($deliverable->required == 'O') {echo("selected");} ?>> 
										O</option>
									<option value= "N/A" <?php if($deliverable->required == 'N/A') {echo("selected");} ?>> 
										N/A</option>
								</td>
							<td align = "center"> {!! Form::text("incharge$i", null, ['class' => 'width90']) !!} </td>
							<td>{!! Form::text("condition$i", null, ['class' => 'width90']) !!}</td>
						</tr>
						@endfor
					</tbody>
				</table>

				<table class="etable table-condensed table-hover project-show table-head"> <tbody>
					<tr> <th colspan="2"> Implementation Stage </th> </tr>
				</tbody> </table>
				<table class="etable table-condensed table-hover project-show sortable full">
					<thead>
						<tr>
							<th width="5%">Template Number</th>
							<th width="5%">Submitted</th>
							<th width="15%">Activities</th>
							<th width="25%">Deliverables</th>
							<th width="10%">{{ $project->applicability}}</th>
							<th width="15%">In-charge</td>
							<th width="25%">Required with Condition</th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 40; $i < 55; $i++)
						<?php $deliverable = $deliverables[$i-1] ?>
						<tr>
							<td align = "center"> {{ $i }} </td>
							<td align = "center"> <input name="submit{{ $i }}" type="checkbox" value="1" <?php if($deliverable->submitted == '1') {echo("checked");} ?>>  </td>	
							@if ($i == 40)
								<td align = "center" rowspan="3">Plan for Production Deployment</td>
							@elseif ($i == 43)
								<td align = "center" rowspan="2">Plan and Conduct Training</td>
							@elseif ($i == 45)
								<td align = "center" rowspan="7">Verify Completeness of Project Deliverables</td>
							@elseif ($i == 52)
								<td align = "center">Confirm Readiness for Production Development</td>
							@elseif ($i == 53)
								<td align = "center" rowspan="2">Perform Production Deployment</td>
							@endif
							<td>{{ $deliverable->deliverable }}</td>
							<td align = "center">
								<select name="required{{ $i }}" style="width: 70px;" value={{ old('status') }}>
									<option value= "-" <?php if($deliverable->required == '-') {echo("selected");} ?>> 
										- </option>
									<option value= "M" <?php if($deliverable->required == 'M') {echo("selected");} ?>> 
										M</option>
									<option value= "O" <?php if($deliverable->required == 'O') {echo("selected");} ?>> 
										O</option>
									<option value= "N/A" <?php if($deliverable->required == 'N/A') {echo("selected");} ?>> 
										N/A</option>
								</td>
							<td align = "center"> {!! Form::text("incharge$i", null, ['class' => 'width90']) !!} </td>
							<td>{!! Form::text("condition$i", null, ['class' => 'width90']) !!}</td>
						</tr>
						@endfor
					</tbody>
				</table>

				<table class="etable table-condensed table-hover project-show table-head"> <tbody>
					<tr> <th colspan="2"> Post Implementation Assessment Stage (PIA) Stage </th> </tr>
				</tbody> </table>
				<table class="etable table-condensed table-hover project-show sortable full">
					<thead>
						<tr>
							<th width="5%">Template Number</th>
							<th width="5%">Submitted</th>
							<th width="15%">Activities</th>
							<th width="25%">Deliverables</th>
							<th width="10%">{{ $project->applicability}}</th>
							<th width="15%">In-charge</td>
							<th width="25%">Required with Condition</th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 55; $i < 59; $i++)
						<?php $deliverable = $deliverables[$i-1] ?>
						<tr>
							<td align = "center"> {{ $i }} </td>
							<td align = "center"> <input name="submit{{ $i }}" type="checkbox" value="1" <?php if($deliverable->submitted == '1') {echo("checked");} ?>> </td>	
							@if ($i == 55)
								<td align = "center" rowspan="4">Assess Project</td>
							@endif
							<td>{{ $deliverable->deliverable }}</td>
							<td align = "center">
								<select name="required{{ $i }}" style="width: 70px;" value={{ old('status') }}>
									<option value= "-" <?php if($deliverable->required == '-') {echo("selected");} ?>> 
										- </option>
									<option value= "M" <?php if($deliverable->required == 'M') {echo("selected");} ?>> 
										M</option>
									<option value= "O" <?php if($deliverable->required == 'O') {echo("selected");} ?>> 
										O</option>
									<option value= "N/A" <?php if($deliverable->required == 'N/A') {echo("selected");} ?>> 
										N/A</option>
								</td>
							<td align = "center"> {!! Form::text("incharge$i", null, ['class' => 'width90']) !!} </td>
							<td>{!! Form::text("condition$i", null, ['class' => 'width90']) !!}</td>
						</tr>
						@endfor
					</tbody>
				</table>

				<table class="etable table-condensed table-hover project-show table-head"> <tbody>
					<tr> <th colspan="2"> Other Deliverables (if any) </th> </tr>
				</tbody> </table>
				<table class="etable table-condensed table-hover project-show sortable full">
					<thead>
						<tr>
							<th width="5%">Template Number</th>
							<th width="5%">Submitted</th>
							<th width="15%">Activities</th>
							<th width="25%">Deliverables</th>
							<th width="10%">{{ $project->applicability}}</th>
							<th width="15%">In-charge</td>
							<th width="25%">Required with Condition</th>
						</tr>
					</thead>
					<tbody>
						@for ($i = 59; $i < 61; $i++)
						<?php $deliverable = $deliverables[$i-1] ?>
						<tr>
							<td align = "center"> {{ $i }} </td>
							<td align = "center"> <input name="submit{{ $i }}" type="checkbox" value="1" <?php if($deliverable->submitted == '1') {echo("checked");} ?>> </td>	
							<td align = "center">  </td>
							<td>{{ $deliverable->deliverable }}</td>
							<td align = "center">
								<select name="required{{ $i }}" style="width: 70px;" value={{ old('status') }}>
									<option value= "-" <?php if($deliverable->required == '-') {echo("selected");} ?>> 
										- </option>
									<option value= "M" <?php if($deliverable->required == 'M') {echo("selected");} ?>> 
										M</option>
									<option value= "O" <?php if($deliverable->required == 'O') {echo("selected");} ?>> 
										O</option>
									<option value= "N/A" <?php if($deliverable->required == 'N/A') {echo("selected");} ?>> 
										N/A</option>
								</td>
							<td align = "center"> {!! Form::text("incharge$i", null, ['class' => 'width90']) !!} </td>
							<td>{!! Form::text("condition$i", null, ['class' => 'width90']) !!}</td>
						</tr>
						@endfor
					</tbody>
				</table>
				<div class = "submit">
							{!! Form::submit('Submit', ['class' => 'btn btn-warning']) !!}
						</div>
			{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@stop