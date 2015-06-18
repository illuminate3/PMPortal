@extends ('app')
@section('content')
	@include('includes.required_errors')
	<div class="row-fluid">
		<!--sidebar content-->
		@include('includes.sidebar_home')

		<div class="span9 pull-right">
			<div class="container panel panel-default full">
				<div class="panel-heading">
					Edit Expense
				</div>
				{!! Form::model($expense, ['method' => 'PATCH', 'action' => ['ExpensesController@update', $expense->id]]) !!}
					<div class="panel-body">
						<table class="table-condensed table-hover"> <tbody>
							<tr>
								<td class="span3 right"> {!! Form::label('item', 'Item: ') !!}</td>
								<td> {!! Form::text('item', null, ['class' => 'span7']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('amount', 'Amount: ') !!}</td>
								<td> {!! Form::input('number','amount', null, ['class' => 'span5', 'step' => '0.01']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right"> {!! Form::label('balance', 'Balance: ') !!}</td>
								<td> {!! Form::input('number','balance', null, ['class' => 'span5', 'step' => '0.01']) !!} </td>
							</tr>

							<tr>
								<td class="span3 right">{!! Form::label('comment', 'Comment: ') !!}</td>
								<td>{!! Form::textarea('comment', null, ['class' => 'span7']) !!}</td>
							</tr>
						</tbody> </table>

						<div class = "submit">
							{!! Form::submit('Submit', ['class' => 'btn btn-warning']) !!}
							{!! Form::close() !!}
							{!! Form::open(['route' => ['expenses.destroy', $expense->id], 'method' => 'delete', 'class' => 'delete' ]) !!}
								{!! Form::submit('Delete', [ 'class' => 'btn btn-danger']) !!}
							{!! Form::close() !!}
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endsection
@stop