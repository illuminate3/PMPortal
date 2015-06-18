@extends('auth.app')
@section('header')
	<link href="{{ asset('/css/signin.css') }}" rel="stylesheet">
	<title>Login</title>
@endsection
@section('content')

<body class ="login-body" >
	<div class="container login-container ">
		<h2 class = "login-header"> 
			<img src="{{ asset('/img/maybankLogo.png') }}"> 
			<font style="font-size:27px;font-family:'calibri';margin-left:15px;"> Maybank Project Manager Portal </font>
		</h2>

		<div class="form-signin">
				{!!  Form::open(['route' => ['users.search'], 'method' => 'get'])  !!}
					<div>{!!  Form::text('query', null, ['placeholder' => 'Search user...'])  !!}</div>
						<br>
						<button type="submit" class="btn btn-warning login-email" align="center" style="width:50%;">Search</button>
						<a href="{{ url('/') }}" class="btn login-email" color="gray" style="width:50%;">Cancel</a>
				{!!  Form::close() !!}
		</div>
	</div>
</body>
@endsection



