@extends ('app')
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_home')		
			

		<div class="span9 pull-right">
			<div class="container panel panel-default full">
				<div class="panel-heading">
					Create Project
				</div>
				{!! Form::open(['route' => ['projects.store'], 'method' => 'post' ]) !!}
					<div class="panel-body">
						<table class="table-condensed table-hover"> <tbody>
							<tr>
								<td class="span3 right"> {!! Form::label('title', 'Title:')!!} </td>
								<td> {!! Form::text('title', null, ['class' => 'span7']) !!} </td>
							</tr>
							<!--
							<tr>
								<td class="span3 right"> {!! Form::label('manager', 'Project Manager:') !!} </td>
								<td> {!! Form::text('manager',Auth::user()->name, ['class' => 'span7' ]) !!} </td>
							</tr> -->
							<tr>
								<td class="span3 right">{!! Form::label('target_date', 'Target Date:') !!}</td>
								<td>{!! Form::input('date','target_date', date('Y-m-d'), ['class' => 'span5']) !!}</td>
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