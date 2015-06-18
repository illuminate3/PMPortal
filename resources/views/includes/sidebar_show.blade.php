<!-- sidebar nav -->
<div class="well span3 sidebar">
<div id="sidebar-wrapper">
<nav id="well sidebar-nav">
		<div>	
		<ul class="nav nav-list nav-stacked dropdown">
			<li class="nav-header">
				Search
				<hr class = "divider">
			</li>
				<div class="container" style="width:100%; height: 50%; overflow:hidden; ">
				{!!  Form::open(['route' => ['projects.search'], 'method' => 'get'])  !!}
				{!!  Form::text('query', null, ['style' => 'width:100%; ','placeholder' => 'Search query...'])  !!} 
			</div>
			{!!  Form::submit('Search', ['class' => 'btn', 'style' => 'width:100%; position:relative;'])  !!}
			{!!  Form::close() !!}
			
			<li class="nav-header" style="margin-top: 10px;"> 
				Filters 
				<hr class = "divider">
			</li>

			<div class="panel-group filters" id="accordion">
				<!-- PROJECT MANAGERS DROPDOWN -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<p class="panel-title">
							<a style="font-size:13px" class="darker accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsePM">
								Project Manager
							</a>			
						</p>
					</div>
					<div id="collapsePM" class="panel-collapse collapse ">
						<div class="panel-body">
							<ul class="nav nav-list">
							@foreach ($managers as $manager)
							<li role="presentation"><a href="{{ action('FiltersController@showManager', $manager->id) }}"> {{ $manager-> name }}</a></li>
							@endforeach	
							</ul>
						</div>
					</div>
				</div>

				<!-- STATUS COLOR DROPDOWN -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<P class="panel-title">
							<a data-toggle="collapse" style="font-size:13px" class="darker accordion-toggle" data-parent="#accordion" href="#collapseColor">
								Status Color
							</a>
						</p>
					</div>
					<div id="collapseColor" class="panel-collapse collapse">
						<div class="panel-body">
							<ul class="nav nav-list">
							<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showColor', 'Green') }}">Green</a></li>
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showColor', 'Amber') }}">Amber</a></li>
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showColor', 'Red') }}">Red</a></li>			
							</ul>
						</div>
					</div>
				</div>

				<!-- STATUS DROPDOWN -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<P class="panel-title">
							<a data-toggle="collapse" style="font-size:13px" class="darker accordion-toggle" data-parent="#accordion" href="#collapseStatus">
								Status
							</a>
						</p>
					</div>
					<div id="collapseStatus" class="panel-collapse collapse">
						<div class="panel-body">
							<ul class="nav nav-list">
							<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStatus', 'Not Yet Started') }}">Not Yet Started</a></li>
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStatus', 'In Progress') }}">In Progress</a></li>
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStatus', 'On Hold') }}">On Hold</a></li>			
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStatus', 'Cancelled') }}">Cancelled</a></li>
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStatus', 'Completed') }}">Completed</a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<P class="panel-title">
							<a data-toggle="collapse" style="font-size:13px" class="darker accordion-toggle" data-parent="#accordion" href="#collapseMonth">
								Month
							</a>
						</p>
					</div>
					<div id="collapseMonth" class="panel-collapse collapse">
						<div class="panel-body">
							<ul class="nav nav-list">
							<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showMonth', '1') }}">Jan</a></li>
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showMonth', '2') }}">Feb</a></li>
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showMonth', '3') }}">Mar</a></li>			
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showMonth', '4') }}">Apr</a></li>
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showMonth', '5') }}">May</a></li>		
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showMonth', '6') }}">Jun</a></li>
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showMonth', '7') }}">Jul</a></li>
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showMonth', '8') }}">Aug</a></li>			
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showMonth', '9') }}">Sep</a></li>					      
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showMonth', '10') }}">Oct</a></li>
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showMonth', '11') }}">Nov</a></li>
					    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showMonth', '12') }}">Dec</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div> <br>
			<center>
			<div class="panel panel-default" style="margin-top: -15px;">
				<div class="panel-heading">
					<p class="panel-title">
						<a href="{{ url('/') }}" style="font-size:13px" class="darker accordion-toggle" >
						All Projects
						</a>
					</p>
				</div>
			</div>
			</center>	
		</ul>
	</div>
	<div>
	<ul class="nav nav-list nav-stacked">
		<li class="nav-header"> 
			Options
			<hr class="divider">
		</li>
			@if (Auth::guest())
				<ul class="nav nav-list nav-stacked">
					<li>
						{!! Form::open(['route' => ['projects.generatepdf', $project->id], 'method' => 'get' ]) !!}
							{!! Form::button('<i class="glyphicon glyphicon-file"></i> Generate Report', ['type' => 'submit', 'class' => 'btn btn-warning span12 option']) !!}
						{!! Form::close() !!}
					</li>
				</ul>	
			
			@elseif ((Auth::user()->role == 'Project Manager') || (Auth::user()->role == 'System Administrator'))		
				<ul class="nav nav-list nav-stacked">
					<li>
						{!! Form::open(['route' => ['projects.create'], 'method' => 'get' ]) !!}
							{!! Form::button('<i class="glyphicon glyphicon-pencil"></i> Create Project', ['type' => 'submit', 'class' => 'btn btn-warning span12 option']) !!}
						{!! Form::close() !!}
					</li>
					</li>
					<li>
						{!! Form::open(['route' => ['projects.destroy', $project->id], 'method' => 'delete' ]) !!}
							{!! Form::button('<i class="glyphicon glyphicon-trash"></i> Delete Project', ['type' => 'submit', 'class' => 'btn btn-warning span12 option']) !!}
						{!! Form::close() !!}
					</li>
					<li>
						{!! Form::open(['route' => ['projects.generatepdf', $project->id], 'method' => 'get' ]) !!}
							{!! Form::button('<i class="glyphicon glyphicon-file"></i> Generate Report', ['type' => 'submit', 'class' => 'btn btn-warning span12 option']) !!}
						{!! Form::close() !!}
					</li>

			@else
						
			@endif
	</ul>
	</div>
</nav>
</div>
</div>