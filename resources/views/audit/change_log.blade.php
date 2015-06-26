@extends ('app')
@section('content')
	<div class="row-fluid">
		@include('includes.sidebar_home')
		<div class="span9 pull-right">
		<div class="container panel panel-default full">
			<div class="panel-heading">
					Audit trail
			</div>
			<div class="panel-body">
				<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> 
					<th colspan="2"> <b>Updates</b> </th> 
					<th class="pull-right add">
						<a  href="{{ url('/change_log/clean') }}" data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="top"
							data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-trash" data-btn-ok-class="btn-warning"
							data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to clear all records?</b></center>">
							Clear All</button></a>
					</th>
					<th class="pull-right add" style="margin-right:10px;">
						<a  href="{{ url('/change_log/deleteOldest') }}" data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="top"
							data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-trash" data-btn-ok-class="btn-warning"
							data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to delete the oldest 50 records?</b></center>">
							Delete Oldest 50 records</button></a>
					</th>
				</tr>
			</tbody> </table>
			</div>
			@include('includes.audit_trail_updates')


			<div class="panel-body">
				<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> 
					<th colspan="2"> <b>Actions</b> </th> 
					<th class="pull-right add">
						<a  href="{{ url('/activity_log/deleteOldest') }}" data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="top"
							data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-trash" data-btn-ok-class="btn-warning"
							data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to clear all records?</b></center>">
							Clear All</button></a>
					</th>
					<th class="pull-right add" style="margin-right:10px;">
						<a  href="{{ url('/activity_log/clean') }}" data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="top"
							data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-trash" data-btn-ok-class="btn-warning"
							data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to delete the oldest 50 records?</b></center>">
							Delete Oldest 50 records</button></a>
					</th>
				</tr>
			</tbody> </table>
			</div>
			@include('includes.audit_trail_actions')
		</div>
	</div>
@endsection
@stop
