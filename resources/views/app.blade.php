<!DOCTYPE html>
<html lang="en">
<head>
	@yield('header')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/ico" href="{{ asset('img/favicon.ico') }}">
	<title>Maybank Project Management Portal</title>

	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<script src="{{ asset('/jquery-1.11.3.js') }}"></script>
	<!-- <link rel="stylesheet" href="{{ asset('/bootstrap.min.css') }}" /> -->
	<script src="{{ asset('/bootstrap.min.js') }}"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style type="text/css">
		#SiteBody
		{
			margin: 7px;
		}
	</style>
	</head>
	<body>
		<div id = "SiteBody">
			<div class="dimension">
				<div class = "dimension-left">  
					<img src="{{ asset('img/maybankLogo.png') }}"><a href="{{ url('/') }}" class = "dimension-home"> Maybank Project Management Portal</a>

					<div class="pull-right">
							@if (Auth::guest())
								<a href="{{ url('/auth/login') }}" class="logout">Login</a>
							@else
								<img src="{{ asset('img/admin.png') }}"> {{ Auth::user()->role }} - {{ Auth::user()->name }} | <a class="logout" href="{{ url('/auth/logout') }}">Logout</a>
							@endif
						</ul>
					</div>
				</div>
			</div>
			<br />

			@include('flash::message')
			@yield('content')
		</div>

		
		<!-- Scripts -->
		<script>
			$('#flash-overlay-modal').modal();
			$('div.alert').not('alert-important').delay(3000).slideUp(300);
		</script> 

	</body>
</html>
