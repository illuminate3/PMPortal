@extends('auth.app')
@section('header')
	<link href="{{ asset('/css/signin.css') }}" rel="stylesheet">
	<title>Login</title>
@stop
@section('content')

<body class ="login-body" >
	<div class="container login-container " >
		<h2 class = "login-header"> 
			<img src="{{ asset('/img/maybankLogo.png') }}"> 
			<font style="font-size:27px;font-family:'calibri';margin-left:15px;"> Maybank Project Manager Portal </font>
		</h2>

		<div class="form-signin">
			<div class="textcontainer">
				{!!  Form::open(['route' => ['users.search'], 'method' => 'get'])  !!}
					{!!  Form::text('query', null, ['placeholder' => 'Search user...'])  !!}</div>
					<div class="btncontainer">
						<button type="submit" class="btn btn-warning login-email span2 btn-half" >Search</button>
						<a href="{{ url('/') }}"><button type="button" class="btn login-email span2 btn-half btn-right">Cancel</button></a>
					</div>
				{!!  Form::close() !!}
		</div>
		<hr style="margin-top:-10px;border-color:#FECF07;border-width:1px;">
		<div class = "allheading">
			All Users
		</div>

		<!--show all users-->
		<div class = "resultscontainer">
			@foreach ($users as $user)
			<div class="panel-group filters" id="accordion" >
				<div class="panel panel-default panel-custom">
					<div class="panel-heading"  style="padding:0px;border:0px;">
						<p class="panel-title">
							<a style="font-size:13px" class="darker accordion-toggle" data-toggle="collapse" href="#{{ $user->id }}">
							{{ $user->email }}
							</a>			
						</p>
					</div>
					<div id="{{ $user->id }}" class="panel-collapse collapse"  >
						<div class="panel-body" style="padding:0px;border:0px;" >
							<div class="form-signin" >
								<p><ul class="nav nav-list">
								<li role="presentation">Name: {{ $user->name }}</li>
								<li role="presentation">Role: {{ $user->role }}</li>
								</ul>
								</p>
								<p>
								<div class="btncontainer">
									{!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete' ]) !!}
									
									<button class="btn btn-warning login-email span2 btn-half" data-singleton="true" data-popout="true" data-toggle="confirmation" data-placement="right"
			data-btn-ok-label="Delete" data-btn-ok-icon="glyphicon glyphicon-trash" data-btn-ok-class="btn-warning"
			data-btn-cancel-label="Cancel" data-btn-cancel-icon="glyphicon glyphicon-ban-circle" data-title="<center><b>Are you sure you want to delete User {{$user->name}}?</b></center>">
		<i class="glyphicon glyphicon-trash" ></i> Delete User</button>

									{!! Form::close() !!}
									{!! Form::open(['route' => ['users.edit', $user->id], 'method' => 'get' ]) !!}
									{!! Form::button('Edit', ['type' => 'submit', 'class' => 'btn login-email span2 btn-half btn-right']) !!}
									{!! Form::close() !!}
								</div>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		@endforeach
		</div>
	</div>
</body>
@stop



