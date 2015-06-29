@extends ('app')
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_show')

		<div class="span9 pull-right">
			<div class="container panel panel-default full">
				<div class="panel-heading">
					Edit Organizational Chart
				</div>
				{!! Form::model($chart, ['method' => 'PATCH', 'action' => ['ChartsController@update', $project->id]]) !!}
				<div class="panel-body">
					<table class="table-condensed table-hover"> 
						<tbody>
							<tr>
								<td class="span3 right">{!! Form::label('project_sponsor', 'Project Sponsor:')!!} </td>
								<td>{!! Form::text('project_sponsor',old('project_sponsor'), ['class' => 'span 7']) !!}</td></tr>
							<tr>
								<td class="span3 right">{!! Form::label('product_owner', 'Product Owner:')!!} </td>
								<td> {!! Form::text('product_owner', old('product_owner'), ['class' => 'span 7']) !!} </td>
							</tr>
							<tr>
								<td class="span3 right">{!! Form::label('project_director','Project Director:')!!} </td>
								<td> {!! Form::text('project_director', old('project_director'), ['class' => 'span 7']) !!} </td>
							</tr>
							<tr>
								<td class="span3 right">{!! Form::label('project_manager','Project Manager:')!!} </td>
								<td> {!! Form::text('project_manager', old('project_manager'), ['class' => 'span 7']) !!} </td>
							</tr>
							<tr>
								<td class="span3 right">{!! Form::label('audit','Audit:')!!} </td>
								<td> {!! Form::text('audit', old('audit'), ['class' => 'span 7']) !!} </td>
							</tr>
							<tr>
								<td class="span3 right">{!! Form::label('group_compliance','Group Compliance:')!!} </td>
								<td> {!! Form::text('group_compliance', old('group_compliance'), ['class' => 'span 7']) !!} </td>
							</tr>
							<tr>
								<td class="span3 right">{!! Form::label('business_project_manager','Business Project Manager')!!} </td>
								<td> {!! Form::text('business_project_manager', old('business_project_manager'), ['class' => 'span 7']) !!} </td>
							</tr>
							<tr>
								<td class="span3 right">{!! Form::label('business_analyst','Business Analyst:')!!} </td>
								<td> {!! Form::text('business_analyst', old('business_analyst'), ['class' => 'span 7']) !!} </td>
							</tr>
							<tr>
								<td class="span3 right">{!! Form::label('quality_management','Quality Management')!!} </td>
								<td> {!! Form::text('quality_management', old('quality_management'), ['class' => 'span 7']) !!} </td>
							</tr>
							<tr>
								<td class="span3 right">{!! Form::label('it_security','IT Security:')!!} </td>
								<td> {!! Form::text('it_security', old('it_security'), ['class' => 'span 7']) !!} </td>
							</tr>
							<tr>
								<td class="span3 right">{!! Form::label('enterprise_architecture','Enterprise Architecure:')!!} </td>
								<td> {!! Form::text('enterprise_architecture', old('enterprise_architecture'), ['class' => 'span 7']) !!} </td>
							</tr>
							<tr>
								<td class="span3 right">{!! Form::label('strategic_procurement','Strategic Procurement:')!!} </td>
								<td> {!! Form::text('strategic_procurement', old('strategic_procurement'), ['class' => 'span 7']) !!} </td>
							</tr>
							<tr>
								<td class="span3 right">{!! Form::label('technical_project_manager','Technical Project Manager:')!!} </td>
								<td> {!! Form::text('technical_project_manager', old('technical_project_manager'), ['class' => 'span 7']) !!} </td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class = "submit">
					{!! Form::submit('Submit', ['class' => 'btn btn-warning']) !!}
				</div>
			</div>
		{!! Form::close() !!}
		</div>
	</div>
</div>
@stop