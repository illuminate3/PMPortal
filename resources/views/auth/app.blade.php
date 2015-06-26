<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../docs-assets/ico/favicon.png">	
	
	<!-- JS -->
	<script src="{{ asset('/js/jquery-1.11.3.js') }}" ></script>
	<script src="{{ asset('/js/bootstrap.min.js') }}" ></script>
	<script src="{{ asset('/js/bootstrap-confirmation.js') }}"></script>
    <!-- CSS -->
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/sbadmin.css') }}" rel="stylesheet">
	
	
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>


	@yield('header')

	
</head>
<body>
	<div class = "container">

		@include('flash::message')
		
		@yield('content')
	</div>

	<!-- Scripts -->
		<script>
			$('#flash-overlay-modal').modal();
			$('div.alert').not('alert-important').delay(3000).slideUp(300);
			$('[data-toggle=confirmation]').confirmation('hide');
		</script> 
</body>
</html>
