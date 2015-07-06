@extends ('app')
@section('header')

@stop
@section('content')
<ul id="organisation" class="hide">
    <li class="company"><b>Project Steering Committee<br>(PSC)</b>
        <ul>
            <li><adjunct>
            	@if( $chart['audit'] == null)
            	--
            	@else
            	{{ $chart['audit'] }}
            	@endif
            	<i><hr class="adjdivider">Audit</i></adjunct>

            	@if( $chart['project_sponsor'] == null)
            	--
            	@else
            	{{ $chart['project_sponsor'] }}
            	@endif
            	<br>
            	<i>Project Sponsor</i>
            	
        <ul>
        	<li><adjunct>
        		@if( $chart['group_compliance'] == null)
            	--
            	@else
            	{{ $chart['group_compliance'] }}
            	@endif
            	<hr class="adjdivider"><i>Group Compliance</adjunct></i>

        		@if( $chart['product_owner'] == null)
            	--
            	@else
            	{{ $chart['product_owner'] }}
            	@endif
            	<i><br>Product Owner</i>
        <ul>
        	<li><adjunct2>
				<b>Governance Team</b>
				<hr class="adjdivider2">
					@if( $chart['quality_management'] == null)
	            	--
	            	@else
	            	{{ $chart['quality_management'] }}
	            	@endif
	            	<hr class="adjdivider"><i>Quality Management</i><hr class="adjdivider2">

	            	@if( $chart['it_security'] == null)
	            	--
	            	@else
	            	{{ $chart['it_security'] }}
	            	@endif
	            	<hr class="adjdivider"><i>IT Security</i><hr class="adjdivider2">

	            	@if( $chart['enterprise_architecture'] == null)
	            	--
	            	@else
	            	{{ $chart['enterprise_architecture'] }}
	            	@endif
	            	<hr class="adjdivider"><i>Enterprise Architecture</i><hr class="adjdivider2">

	            	@if( $chart['strategic_procurement'] == null)
	            	--
	            	@else
	            	{{ $chart['strategic_procurement'] }}
	            	@endif
	            	<hr class="adjdivider"><i>Strategic Procurement</i><hr class="adjdivider2">
	        		</adjunct2>

        		@if( $chart['project_director'] == null)
            	--
            	@else
            	{{ $chart['project_director'] }}
            	@endif
        		<br><i>Project Director</i>
        <ul>
        	<li><adjunct3>
        		<b>Support Team</b>

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
                <table class="memberstable">
	        		@foreach ($support_team_members as $support_team_member)
    	        		<tr>
                        <td>
    	        		{{ $support_team_member-> name }} [{{ $support_team_member-> role}}]
                        </td>
                        @if (Auth::guest())
                        @else
                        @if ($project['user_id'] == null)
                        @else
                        @if ($project['user_id'] == Auth::user()['id'])
                            <td>
                                <a title="Edit member" href="{{ action('SupportTeamMembersController@edit', [$support_team_member->project_id, $support_team_member->id]) }}"><img src="{{ asset('img/glyphicons-31-pencil.png')}}" style="width:10px;" ></img></a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['support_team_members.destroy', $support_team_member->project_id, $support_team_member->id], 'method' => 'delete', 'class' => 'delete' ]) !!}
                                <input type="image" name="image" src="{{ asset('img/glyphicons-17-bin.png')}}" style="width:10px;" title="Delete member">
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endif
                        @endif
                        @endif
	        		@endforeach
                </table>
	        	@endif
        	</adjunct3>
        		@if( $chart['project_manager'] == null)
            	--
            	@else
            	{{ $chart['project_manager'] }}
            	@endif
        		<br><i>Project Manager</i>
        <ul>
        	<li>@if( $chart['technical_project_manager'] == null)
            	--
            	@else
            	{{ $chart['technical_project_manager'] }}
            	@endif
        		<br><i>Technical Project Manager</i>

        			


        		<ul>
        				<li><b>Technical Project Team</b>

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
							<br>
							--
							@else
                            <table class="memberstable">
        					@foreach ($technical_project_team_members as $technical_project_team_member)
                                <tr>
                                    <td>
                                    {{$technical_project_team_member->name}} [{{$technical_project_team_member->role}}]
                                    </td>
                                @if (Auth::guest())
                                @else
                                @if ($project['user_id'] == null)
                                @else
                                @if ($project['user_id'] == Auth::user()['id'])
                                    <td>
                                        <a title="Edit member" href="{{ action('TechnicalProjectTeamMembersController@edit', [$technical_project_team_member->project_id, $technical_project_team_member->id] ) }}"> <img src="{{ asset('img/glyphicons-31-pencil.png')}}" style="width:10px;" > </img></a>
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['technical_project_team_members.destroy', $technical_project_team_member->project_id, $technical_project_team_member->id], 'method' => 'delete' ]) !!}
                                        <input type="image" name="image" src="{{ asset('img/glyphicons-17-bin.png')}}" style="width:10px;" title="Delete member">
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endif
                                @endif
                                @endif
        					@endforeach
                            </table>
        					@endif
        				</li>
        			</ul>
        			
        		<li>@if( $chart['business_analyst'] == null)
            	--
            	@else
            	{{ $chart['business_analyst'] }}
            	@endif
        			<br><i>Business Analyst</i>

        		</li>
        		<li>
        		@if( $chart['business_project_manager'] == null)
            	--
            	@else
            	{{ $chart['business_project_manager'] }}
            	@endif
        			<br><i>Business Project Manager</i>
        			<ul>
        				<li><b>Business Project Team</b>

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
							<br>
							--
							@else
                            <table class="memberstable">
        					@foreach ($business_project_team_members as $business_project_team_member)
									<tr>
                                    <td>
									{{ $business_project_team_member-> name }} [{{ $business_project_team_member-> role}}]
        					    </td>
                                @if (Auth::guest())
                                @else
                                @if ($project['user_id'] == null)
                                @else
                                @if ($project['user_id'] == Auth::user()['id'])
                                    <td>
                                        <a title="Edit member" href="{{ action('BusinessProjectTeamMembersController@edit', [$business_project_team_member->project_id, $business_project_team_member->id] ) }}"> <img src="{{ asset('img/glyphicons-31-pencil.png')}}" style="width:10px;" > </img></a>
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['business_project_team_members.destroy', $business_project_team_member->project_id, $business_project_team_member->id], 'method' => 'delete' ]) !!}
                                        <input type="image" name="image" src="{{ asset('img/glyphicons-17-bin.png')}}" style="width:10px;" title="Delete member">
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endif
                                @endif
                                @endif

                            @endforeach
                            </table>
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