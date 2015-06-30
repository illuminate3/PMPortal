@extends('auth.app')
@section('header')
	<link href="{{ asset('/css/signin.css') }}" rel="stylesheet">
	<title>Login</title>
@stop
@section('content')
<body class ="login-body" >
	<div class="container login-container ">
		<h2 class = "login-header"> 
			<img src="{{ asset('/img/maybankLogo.png') }}"> 
			<font style="font-size:27px;font-family:'calibri';margin-left:15px;"> Maybank Project Manager Portal </font>
		</h2>

					@if (count($errors) > 0)
					<div class="alert alert-danger" center>
						<strong>Whoops!</strong> There were some problems with your input.<br><br>
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif

		<form class="form-signin" role="form" method="POST" action="{{ url('/auth/login') }}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<div class="form-group login-email">
				<input type="text" class="form-control login-email" name="email" value="{{ old('email') }}" placeholder="E-Mail">
			</div>

			<div class="form-group login-email">
					<input type="password" class="form-control login-email" name="password" placeholder="Password">
			</div>

			<div class="form-group login-email">
					<button type="submit" class="btn btn-warning login-email option">Login</button>
			</div>
		</form>
	</div>
</body>
@stop
