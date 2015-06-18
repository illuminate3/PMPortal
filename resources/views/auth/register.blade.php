@extends('auth.app')
@section('header')
	<link href="{{ asset('/css/signup.css') }}" rel="stylesheet">
	<title>Add Users &diams; for Maybank Project Management Portal</title>
@endsection
@section('content')


<body class ="register-body" >
	<div id= "wrapper">
		<br>
					<form class="form-horizontal register" role="form" method="POST" action="{{ url('/auth/register') }}">
						<h2> Add Users </h2>
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
								<td align="right"> Name: </td>
								<td><input type="text" class="form-control" name="name" value="{{ old('name') }}"></td>
							</tr>
							<tr>
								<td align="right"> E-Mail Address: </td>
								<td><input type="email" class="form-control" name="email" value="{{ old('email') }}"></td>
							</tr>
							<tr>
								<td align="right"> Password: </td>
								<td><input type="password" class="form-control" name="password"></td>
							</tr>
							<tr>
								<td align="right"> Confirm Password: </td>
								<td><input type="password" class="form-control" name="password_confirmation"></td>
							</tr>

							<tr>
								<td align="right"> Role: </td>
								<td><select class="form-control" name="role" value="{{ old('role') }}">
									<option value="Project Manager">Project Manager</option>
									<option value="User">User</option>
									<option value="System Administrator">System Administrator</option>
								</select></td>
							</tr>
						</tbody></table> <br>

						<div class="register-button">
							<br>
							<button type="submit" class="btn btn-warning register-submit" align="center">
								Register
							</button>
							<a href="../" class="btn btn-default register-submit" color="gray">
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
@endsection
