@extends ('app')
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_home')

		<div class="span9 pull-right">
			<div class="container panel panel-default full">
				<div class="panel-heading">
					Edit Accomplishment
				</div>
				{!! Form::model($accomplishment, ['method' => 'PATCH', 'action' => ['AccomplishmentsController@update', $accomplishment->id]]) !!}
					<div class="panel-body">
						<table class="table-condensed table-hover"> <tbody>
							<tr>
								<td class="span3 right"> {!! Form::label('accomplishment', 'Accomplishment: ') !!} </td>
								<td> {!! Form::textarea('accomplishment', null, ['class' => 'span7']) !!} </td>
							</tr>
						</tbody> </table>

						<div class = "submit">
							{!! Form::submit('Submit', ['class' => 'btn btn-warning']) !!}
							{!! Form::close() !!}
							{!! Form::open(['route' => ['accomplishments.destroy', $accomplishment->id], 'method' => 'delete', 'class' => 'delete' ]) !!}
								{!! Form::submit('Delete', [ 'class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
						</div>
					</div>
			</div>
		</div>
	</div>
@stop