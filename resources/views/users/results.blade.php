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

		@foreach ($users as $user)
			<div class="panel-group filters" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<p class="panel-title">
						<a style="font-size:13px" class="darker accordion-toggle" data-toggle="collapse" href="#{{ $user->id }}">
							{{ $user->email }}
						</a>			
					</p>
				</div>
				<div id="{{ $user->id }}" class="panel-collapse collapse ">
					<div class="panel-body">
						<p>
							<ul class="nav nav-list">
								<li role="presentation">Name: {{ $user->name }}</li>
								<li role="presentation">Role: {{ $user->role }}</li>
							</ul>
						</p>
						<p>
							<ul class="nav nav-list">
								{!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete' ]) !!}
									{!! Form::button('Delete User Account', ['type' => 'submit', 'class' => 'btn btn-warning option']) !!}
									{!! Form::close() !!}
								{!! Form::open(['route' => ['users.edit', $user->id], 'method' => 'get' ]) !!}
									{!! Form::button('Edit Account Details', ['type' => 'submit', 'class' => 'btn btn-warning option']) !!}
									{!! Form::close() !!}
							</ul>
						</p>
					</div>
				</div>
			</div>
			</div>
		@endforeach
	
</body>
@endsection
