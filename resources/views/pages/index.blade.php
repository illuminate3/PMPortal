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
						
						@if (Auth::guest())
							@foreach ($projects as $project)
								@include('includes.index_details')	
							@endforeach
						@else
							@foreach ($projects as $project)
								@if ($project['confidentiality'] == 'Public')
									@include('includes.index_details')	
								@else
									@if ( ($project['user_id'] == Auth::user()->id) || (Auth::user()->role == 'System Administrator') )
										@include('includes.index_details')
									@else
										@if ($project->getUserListAttributes() == null)
										@else
											@if (in_array(Auth::user()->id,$project->getUserListAttributes()))
												@include('includes.index_details')
											@endif
										@endif
									@endif
								@endif
							@endforeach
						@endif
						
						</tbody>
					</table>
				</center>
			</div>
		</div>
	</div>
@stop