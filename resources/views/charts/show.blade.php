@extends ('app')
@section('header')

@stop
@section('content')
<ul id="organisation" class="hide">
    <li class="company"><em>Project Steering Committee<hr class="divider">(PSC)</em>
        <ul>
            <li><adjunct>
            	@if( $chart['project_sponsor'] == null)
            	--
            	@else
            	{{ $chart['project_sponsor'] }}
            	@endif
            	<hr class="adjdivider">Audit</adjunct>

            	@if( $chart['project_sponsor'] == null)
            	--
            	@else
            	{{ $chart['project_sponsor'] }}
            	@endif
            	<hr class="divider">
            	 Project Sponsor
            	
        <ul>
        	<li><adjunct>
        		@if( $chart['group_compliance'] == null)
            	--
            	@else
            	{{ $chart['group_compliance'] }}
            	@endif
            	<hr class="adjdivider">Group Compliance</adjunct>

        		@if( $chart['product_owner'] == null)
            	--
            	@else
            	{{ $chart['product_owner'] }}
            	@endif
            	<hr class="divider">Product Owner
        <ul>
        	<li><adjunct2>
				<b>Governance Team</b>
				<hr class="adjdivider">
					@if( $chart['quality_management'] == null)
	            	--
	            	@else
	            	{{ $chart['quality_management'] }}
	            	@endif
	            	<hr class="adjdivider">Quality Management<hr class="adjdivider">

	            	@if( $chart['it_security'] == null)
	            	--
	            	@else
	            	{{ $chart['it_security'] }}
	            	@endif
	            	<hr class="adjdivider">IT Security<hr class="adjdivider">

	            	@if( $chart['enterprise_architecture'] == null)
	            	--
	            	@else
	            	{{ $chart['enterprise_architecture'] }}
	            	@endif
	            	<hr class="adjdivider">Enterprise Architecture<hr class="adjdivider">

	            	@if( $chart['strategic_procurement'] == null)
	            	--
	            	@else
	            	{{ $chart['strategic_procurement'] }}
	            	@endif
	            	<hr class="adjdivider">Strategic Procurement<hr class="adjdivider">
	        		</adjunct2>

        		@if( $chart['project_director'] == null)
            	--
            	@else
            	{{ $chart['project_director'] }}
            	@endif
        		<hr class="divider">Project Director
        <ul>
        	<li><adjunct3>
        		Support Team

        		@if (Auth::guest())
						@else
							@if ($project['user_id'] == null)
							@else
								@if ($project['user_id'] == Auth::user()['id'])
								<a class="add" href="{{ action('SupportTeamMembersController@create', [$project->id] ) }}"> <i class="glyphicon glyphicon-plus"></i></a></th>
								@endif
							@endif
						@endif
				@if ($support_team_members == "[]")
					<hr class="adjdivider">
					--
				@else
	        		@foreach ($support_team_members as $support_team_member)
	        		<hr class="adjdivider">
	        		<a href="#" id="support_team_member" data-type="text" data-pk="2" data-url="{{ action('SupportTeamMembersController@edit', [$support_team_member->project_id, $support_team_member->id]) }}" data-title="Enter support team member">
	        		{{ $support_team_member-> name }} [{{ $support_team_member-> role}}]</a>
	        		@endforeach
	        	@endif
        	</adjunct3>
        		@if( $chart['project_manager'] == null)
            	--
            	@else
            	{{ $chart['project_manager'] }}
            	@endif
        		<hr class="divider">Project Manager
        <ul>
        	<li>@if( $chart['technical_project_manager'] == null)
            	--
            	@else
            	{{ $chart['technical_project_manager'] }}
            	@endif
        		<hr class="divider">Technical Project Manager

        			


        		<ul>
        				<li>Technical Project Team

        					@if (Auth::guest())
						@else
							@if ($project['user_id'] == null)
							@else
								@if ($project['user_id'] == Auth::user()['id'])
								<a class="add" title="Add Team Member" href="{{ action('TechnicalProjectTeamMembersController@create', [$project->id] ) }}"> <i class="glyphicon glyphicon-plus"></i></a>
								@endif
							@endif
						@endif

							@if ($technical_project_team_members == "[]")
							<hr class="divider">
							--
							@else
        					@foreach ($technical_project_team_members as $technical_project_team_member)
								<hr class="divider">
                                {{$technical_project_team_member->name}} {{$technical_project_team_member->role}}
                                @endforeach
        					@endif
        				</li>
        			</ul>
        			
        		<li>@if( $chart['business_analyst'] == null)
            	--
            	@else
            	{{ $chart['business_analyst'] }}
            	@endif
        			<hr class="divider">Business Analyst

        		</li>
        		<li>
        		@if( $chart['business_project_manager'] == null)
            	--
            	@else
            	{{ $chart['business_project_manager'] }}
            	@endif
        			<hr class="divider">Business Project Manager
        			<ul>
        				<li>Business Project Team

        					@if (Auth::guest())
						@else
							@if ($project['user_id'] == null)
							@else
								@if ($project['user_id'] == Auth::user()['id'])
								<a class="add" href="{{ action('BusinessProjectTeamMembersController@create', [$project->id] ) }}"> <i class="glyphicon glyphicon-plus"></i></a>
								@endif
							@endif
						@endif

							@if ($business_project_team_members == "[]")
							<hr class="divider">
							--
							@else
        					@foreach ($business_project_team_members as $business_project_team_member)
									<hr class="divider">
									{{ $business_project_team_member-> name }} [{{ $business_project_team_member-> role}}]
                                    @endforeach
        					@endif
        				</li>
        			</ul>
        		</li>
        	</li>
        </ul>
        </li>
    	</ul>
        </ul>
    </li>
    </ul>
    </li>
    </ul>
    </li>
	</ul>
    </li>
</ul>
           
            
            
<div class="row-fluid">
	<!--sidebar content-->
	@include('includes.sidebar_show')

<div id="chart">
</div>


	<div class="span9 pull-right">
		<div class="container panel panel-default full">
			<div class="panel-heading">
				{{ $project-> title }} - Organizational Chart
				@if (Auth::guest())
				@else
					@if ($project['user_id'] == null)
					@else
						@if ($project['user_id'] == Auth::user()['id'])
							<a class="pull-right add" href="{{ action('ChartsController@edit', [$project->id] ) }}"> <i class="glyphicon glyphicon-pencil"></i> Edit Chart</a>
						     
                        @else
						@endif
					@endif
				@endif
			</div>
			<div id="main">
            </div>
		</div>

	</div>

@stop

@section('footerscript')
$(function() {
    $("#organisation").orgChart({
        container: $("#main")
    });
});

$(function() {
	var objHeight = $(".adjunct3.node").height() + 20;
     $('.lines.linelevel4 .line').height(objHeight);
 });

 
@stop