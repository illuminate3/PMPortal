<table class="etable table-condensed table-hover project-show"> <tbody>
				<tr>
					<td class="span3 right">CAC: </td>
					<td class="span3 left"> {{ $project-> cac }} </td>
				</tr>
				<tr>

					<td class= "span3 right">Project Status: </td>
					<td class="span3 left">{{ $project-> status }} - 
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
					</td>
					<td class="span2 right"> % Done: </td>
					<td class-"span8 left">{{ $project->percent}}%</td>
				</tr>

				<tr>
					<td class="span3 right" style="width: 800px; height: 80px;">Rationale: </td>
					<td colspan="3"> {{ $project-> rationale }} </td>
				</tr>
				

				<tr>
					<td class="span3 right"> {!! Form::label('target_start', 'Target Start:') !!} </td>
					<td class="span3 left"> {{ $project-> target_start ->toFormattedDateString() }} </td>
					<td class="span2 right"> {!! Form::label('target_start', 'Target End:') !!} </td>
					<td class="span8 left"> {{ $project-> target_end ->toFormattedDateString()}}</td>
				</tr>
				<tr>

				</tr>

							<!-- 'Nov 30, -0001' is the default value when the input field is read as null -->
					
								@if ( $project-> actual_start ->toFormattedDateString() == 'Nov 30, -0001')
									<?php $actual_start = 'TBA' ?>
								@else
									<?php $actual_start = $project['actual_start']->toFormattedDateString() ?>
								@endif


								@if ( $project-> actual_end ->toFormattedDateString() == 'Nov 30, -0001' )
									<?php $actual_end = 'TBA' ?>
								@else
									<?php $actual_end = $project['actual_end']->toFormattedDateString() ?>
								@endif
					
					<td class="span3 right">{!! Form::label('actual_start', 'Actual Start:') !!}</td>																						
					<td class="span3 left">{{ $actual_start}}</td>
					<td class="span2 right">{!! Form::label('actual_end', 'Actual End:') !!}</td>
					<td class="span8 left">{{ $actual_end }}</td>
				<tr>
					<td class= "span3 right">Budget: </td>
					<td class="span3 left">{{ $project-> budget }}</td>
					<td class= "span2 right">Utilization: </td>
					<td class="span8 left"> {{ $project -> utilization }} </td>
				</tr>

				<tr>
					<td class= "span3 right">Target Mandays: </td>
					<td>{{ $project-> target_mandays }}</td>
				</tr>		
				
				<tr>
					<td class= "span3 right">Importance: </td>
					<td>{{ $project-> importance }}</td>
				</tr>

				<tr>
					<td class= "span3 right">Applicability: </td>
					<td>{{ $project-> applicability }}</td>
				</tr>

				<tr>
					<td class= "span3 right">Confidentiality: </td>
					<td>{{ $project-> confidentiality }}</td>
				</tr>

				<tr>
					<td class= "span3 right">Personnel: </td>
					<td>
						@foreach($project->users as $user)
							{{ $user->name }}<br>
						@endforeach
					</td>
				</tr>

</tbody> </table>