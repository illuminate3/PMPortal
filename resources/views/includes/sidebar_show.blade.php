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
				{!!  Form::text('query', null, ['style' => 'width:100%; ','placeholder' => 'Search with CAC or title'])  !!} 
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
							@foreach ($fmanagers as $fmanager)
							<li role="presentation"><a href="{{ action('FiltersController@showManager', $fmanager) }}"> {{ $fmanager }}</a></li>
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

				<div class="panel panel-default" id="months">
					<div class="panel-heading">
						<P class="panel-title">
							<a data-toggle="collapse" style="font-size:13px" class="darker accordion-toggle" data-parent="#accordion" href="#collapseMonth">
								Month
							</a>
						</p>
					</div>
					<div id="collapseMonth" class="panel-collapse collapse">
						<div class="panel-heading" style="border-bottom:1px solid lightgray;">
							<P class="panel-title">
								<a data-toggle="collapse" style="font-size:13px" class="darker accordion-toggle" data-parent="#months" href="#collapseStartmonth" >
								Target Start

								</a>
							</p>
						</div>
						<div id="collapseStartmonth" class="panel-collapse collapse">
							<ul class="nav nav-list">
								<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStartmonth', '1') }}">Jan</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStartmonth', '2') }}">Feb</a></li>
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStartmonth', '3') }}">Mar</a></li>			
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStartmonth', '4') }}">Apr</a></li>
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStartmonth', '5') }}">May</a></li>		
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStartmonth', '6') }}">Jun</a></li>
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStartmonth', '7') }}">Jul</a></li>
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStartmonth', '8') }}">Aug</a></li>			
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStartmonth', '9') }}">Sep</a></li>					      
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStartmonth', '10') }}">Oct</a></li>
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStartmonth', '11') }}">Nov</a></li>
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showStartmonth', '12') }}">Dec</a></li>
							</ul>
						</div>

						<div class="panel-heading" style="border-bottom:1px solid lightgray;">
							<P class="panel-title">
								<a data-toggle="collapse" style="font-size:13px" class="darker accordion-toggle" data-parent="#months" href="#collapseEndmonth" >
								Target End
								</a>
							</p>
						</div>
						<div id="collapseEndmonth" class="panel-collapse collapse">
							<ul class="nav nav-list">
								<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showEndmonth', '1') }}">Jan</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showEndmonth', '2') }}">Feb</a></li>
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showEndmonth', '3') }}">Mar</a></li>			
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showEndmonth', '4') }}">Apr</a></li>
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showEndmonth', '5') }}">May</a></li>		
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showEndmonth', '6') }}">Jun</a></li>
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showEndmonth', '7') }}">Jul</a></li>
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showEndmonth', '8') }}">Aug</a></li>			
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showEndmonth', '9') }}">Sep</a></li>					      
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showEndmonth', '10') }}">Oct</a></li>
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showEndmonth', '11') }}">Nov</a></li>
						    	<li role="presentation"><a role="menuitem" tabindex="-1" href="{{ action('FiltersController@showEndmonth', '12') }}">Dec</a></li>
							</ul>
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
			<li class="nav-header" style="margin-top: 10px;"> 
				Options
				<hr class="divider">
			</li>
			@if (Auth::guest())
			@else
				@if (Auth::user()->role == "Project Manager") 
					@if ($project->user_id == null)
					@else
						@if (Auth::user()->id == $project->user_id)
							<li>
								{!! Form::open(['route' => ['projects.create'], 'method' => 'get' ]) !!}
								{!! Form::button('<i class="glyphicon glyphicon-pencil"></i> Create Project', ['type' => 'submit', 'class' => 'btn btn-warning span12 option']) !!}
								{!! Form::close() !!}
							</li>
							<li>
								@include('includes.confirm')
							</li>
						@else
						@endif
					@endif
				@else
				@endif
			@endif
			<li>
				{!! Form::open(['route' => ['projects.generatepdf', $project->id], 'method' => 'get' ]) !!}
				{!! Form::button('<i class="glyphicon glyphicon-file"></i> Generate Report', ['type' => 'submit', 'class' => 'btn btn-warning span12 option']) !!}
				{!! Form::close() !!}		
			</li>
			@if (Auth::guest())
			@else
				@if (Auth::user()->role == "Project Manager") 
				<li>
					{!! Form::open(['url' => '/change_log', 'method' => 'get' ]) !!}
					{!! Form::button('<i class="glyphicon glyphicon-book"></i> Audit Trail', ['type' => 'submit', 'class' => 'btn btn-warning span12 option', 'id'=>'audittrailclick']) !!}
					{!! Form::close() !!}		
				</li>
				@else
				@endif
			@endif
		</ul>
	</div>		


	<div>
	<ul class="nav nav-list nav-stacked">
		@if (Auth::guest())
		@else
			@if (Auth::user()->role == 'System Administrator')	
				<li class="nav-header" style="margin-top: 10px;"> 
					Admin
					<hr class="divider">
				</li>
				<div class="panel-group filters" id="accordion">
				<div class="panel panel-default">
					<div class="panel-heading">
						<p class="panel-title">
							<a style="font-size:13px" class="darker accordion-toggle" data-toggle="collapse" href="#collapseAB">
								User Management
							</a>			
						</p>
					</div>
					<div id="collapseAB" class="panel-collapse collapse ">
						<div class="panel-body">
							<ul class="nav nav-list">
								<li role="presentation"><a role="menuitem" href="{{ url('/auth/register') }}">Add User</a></li>
								<li role="presentation"><a role="menuitem" href="{{ url('/users') }}">Edit/Delete User</a></li>
							</ul>
						</div>
					</div>
				</div>
<!-- 				<div class="panel panel-default">
					<div class="panel-heading ">
						<p class="panel-title">
							<a style="font-size:13px" class="darker accordion-toggle" data-toggle="collapse" href="#collapseAC">
								Database Management
							</a>			
						</p>
					</div>
					<div id="collapseAC" class="panel-collapse collapse " style="overflow:visible;">
						<div class="panel-body ">
							<ul class="nav nav-list" >
								<li role="presentation"><a role="menuitem" href="{{ url('/backup') }}" data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="right" 
							data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-trash" data-btn-ok-class="btn-warning"
							data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to backup database? Old dump.sql file will be replaced.</b></center>">
							Backup Database</a></li>
								<li role="presentation"><a role="menuitem" href="{{ url('/backup/load') }}">Load Backup</a></li>
							</ul>
						</div>
					</div>
				</div> -->
				<div class="panel panel-default">
					<div class="panel-heading">
						<p class="panel-title">
							<a style="font-size:13px" class="darker accordion-toggle" href="{{ url('/backup') }}" data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="right" 
							data-btn-ok-label="Backup" data-btn-ok-icon="glyphicon glyphicon-download" data-btn-ok-class="btn-warning"
							data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to backup database? Old dump.sql file will be replaced.</b></center>">
								Backup Database
							</a>			
						</p>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<p class="panel-title">
							<a style="font-size:13px" class="darker accordion-toggle" href="{{ url('/backup/load') }}" data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="right" 
							data-btn-ok-label="Load" data-btn-ok-icon="glyphicon glyphicon-upload" data-btn-ok-class="btn-warning"
							data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to load backup? Current data not in the backup sql file will be deleted.</b></center>">
								Load Backup
							</a>			
						</p>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<p class="panel-title">
							<a style="font-size:13px" class="darker accordion-toggle" href="{{ url('/change_log') }}">
								Audit Trail
							</a>			
						</p>
					</div>
				</div>
			</div>
			@else
			@endif
		@endif
	</ul>
	</div>
</nav>
</div>
</div>