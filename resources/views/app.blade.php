<!DOCTYPE html>
<html lang="en">
<head>
	@yield('header')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="icon" type="image/ico" href="{{ asset('img/favicon.ico') }}">
	<title>Maybank Project Management Portal</title>
	
	<!-- JS -->
	<script src="{{ asset('/js/jquery-1.11.3.js') }}" ></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}" ></script>
	<script src="{{ asset('/js/sorttable.js') }}" ></script>

	<script src="{{ asset('/js/select2.full.min.js') }}"></script>

	<script src="{{ asset('/js/jquery.orgchart.js') }}"></script>
	<script src="{{ asset('/js/bootstrap-confirmation.js') }}"></script>

	<script src="{{ asset('/js/pace.js') }}"></script>
	

	<!-- CSS -->
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/select2.css') }}" rel="stylesheet">


	<link rel="stylesheet" href="{{ asset('/css/jquery.orgchart.css') }}">
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	
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
				<div class = "dimension-left" > 
				<table width="100%">
					<tr>
						<td class="apptitleheader" width="70%">
						<img src="{{ asset('img/maybankLogo.png') }}"><a href="{{ url('/') }}" class = "dimension-home"> Maybank Project Management Portal</a>
						</td>
						<td align="right">
						<div class="pull-right">
								@if (Auth::guest())
									<a href="{{ url('/auth/login') }}" class="logout">Login</a>
								@else
									<img src="{{ asset('img/admin.png') }}"> {{ Auth::user()->role }} - <span class="break"> <a href="{{ url('/my_projects') }}" title="My Projects"> {{ Auth::user()->name }}</a> |</span> <span class="break"><a class="logout" href="{{ url('/auth/logout') }}"> Logout</a></span>
								@endif
							</ul>
						</div>
						</td>
					</tr>
				</table>
				</div>
			</div>
			<br />

			@include('flash::message')
			@yield('content')
		</div>

		
		<!-- Scripts -->
		<script>
			@yield('footerscript')
			$('#projectusers').select2({
				placeholder: 'Choose users'
			}
				);
			$('#flash-overlay-modal').modal();
			$('div.alert').not('alert-important').delay(3000).slideUp(300);
			$('[data-toggle=confirmation]').confirmation('hide');
			
			$(document).ajaxStart(function() {
    Pace.restart();
}).ajaxStop( function() { 
    Pace.stop();
}).ajaxError( function(event, request, settings) { 
    Pace.stop();
}).ajaxComplete( function(event, request, settings) { 
    Pace.stop();
});
		</script> 
	</body>
</html>
