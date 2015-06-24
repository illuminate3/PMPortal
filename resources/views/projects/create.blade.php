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
								<td class="span3 right"> {!! Form::label('cac', 'CAC No.:')!!} </td>
								<td> {!! Form::text('cac', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('title', 'Title:')!!} </td>
								<td> {!! Form::text('title', null, ['class' => 'span7']) !!} </td>
							</tr>
							<!--
							<tr>
								<td class="span3 right"> {!! Form::label('manager', 'Project Manager:') !!} </td>
								<td> <select class="span5" name="user_id" value="{{ old('user_id') }}">
									@foreach ($managers as $manager)
										<option value= {{ $manager-> id }}> {{ $manager-> name }}</option>
									@endforeach
								</select> </td>
							</tr>
							-->
							<tr>
								<td class="span3 right">{!! Form::label('target_start', 'Target Start:') !!}</td>
								<td>{!! Form::input('date','target_start', date('Y-m-d'), ['class' => 'span5']) !!}</td>
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('target_end', 'Target End:') !!}</td>
								<td>{!! Form::input('date','target_end', date('Y-m-d'), ['class' => 'span5']) !!}</td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('budget', 'Budget: ') !!}</td>
								<td> {!! Form::input('number','budget', null, ['class' => 'span5', 'step' => '0.01']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('hardware', 'Hardware:')!!} </td>
								<td> {!! Form::text('hardware', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('software', 'Software:')!!} </td>
								<td> {!! Form::text('software', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('target_mandays', 'Target mandays: ') !!}</td>
								<td> {!! Form::input('number','target_mandays', null, ['class' => 'span5', 'step' => '1']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('applicability', 'Applicability:') !!} </td>
								<td> <select class="span5" name="applicability" value="{{ old('applicability') }}">
									<option value="New or Replacement of IT Solution"> New or Replacement of IT Solution</option>
									<option value="Enhancement or Application System Upgrade"> Enhancement or Application System Upgrade</option>
									<option value="IT Infrastructure"> IT Infrastructure</option>
								</select> </td>
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