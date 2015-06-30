@extends('auth.app')
@section('header')
	<link href="{{ asset('/css/signup.css') }}" rel="stylesheet">
	<title>Edit User &diams; for Maybank Project Management Portal</title>
@stop
@section('content')


<body class ="register-body" >
	<div id= "wrapper">
		<br>
					{!! Form::model($user, ['method' => 'POST', 'action' => ['UsersController@postUpdateAccount', $user->id], 'class' => 'form_horizontal register']) !!}
						<h2> Editing {{ $user->name }}'s Account </h2>
						&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;
						&nbsp;&nbsp;&nbsp;
						@if (count($errors) > 0)
						<div class="alert alert-danger register-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
							@endif
						<br> <br>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<table class = "register-table" cellpadding="5px"> <tbody>
							<tr>
								<td align="right">{!! Form::label('name', 'Name:') !!}</td>
								<td>{!! Form::text('name',old('name'), ['class' => 'form-control']) !!}</td>
							</tr>
							<tr>
								<td align="right">{!! Form::label('email', 'Email:') !!}</td>
								<td>{!! Form::email('email',old('email'), ['class' => 'form-control']) !!}</td>
							</tr>
							<tr>
								<td align="right">{!! Form::label('old_password', 'Old Password:') !!}</td>
								<td>{!! Form::password('old_password',null, ['class' => 'form-control']) !!}</td>
							</tr>
							<tr>
								<td align="right">{!! Form::label('password', 'New Password:') !!}</td>
								<td>{!! Form::password('password',null, ['class' => 'form-control']) !!}</td>
							</tr>
							<tr>
								<td align="right">{!! Form::label('confirm_new_password', 'Confirm New Password:') !!}</td>
								<td>{!! Form::password('confirm_new_password',null, ['class' => 'form-control']) !!}</td>
							</tr>

							<tr>
								<td align="right">{!! Form::label('role', 'Role:') !!}</td>
								<td><select class="form-control" name="role" value={{ old('role') }}>
									<option value= "Project Manager" <?php if($user->role == 'Project Manager') {echo("selected");} ?>> 
										Project Manager</option>
									<option value= "User" <?php if($user->role == 'User') {echo("selected");} ?>> 
										User</option>
									<option value= "System Administrator" <?php if($user->role == 'System Administrator') {echo("selected");} ?>> 
										System Administrator</option>
								</select></td>
							</tr>
						</tbody></table> <br>

						<div class="register-button">
							<br>
							<button type="submit" class="btn btn-warning register-submit" align="center">
								Update
							</button>
							<a href="{{ url('/users') }}" class="btn btn-default register-submit" color="gray">
								Cancel
							</a>
						</div>
					</form>
	</div>
<!-- Bootstrap core JavaScript -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- Page Specific Plugins -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="js/morris/chart-data-morris.js"></script>
    <script src="js/tablesorter/jquery.tablesorter.js"></script>
    <script src="js/tablesorter/tables.js"></script>
</body>
@stop
