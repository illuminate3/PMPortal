<head>
	<title>Audit Trail</title>
	<link href="{{ asset('/css/generate.css') }}" rel="stylesheet">
</head>
<body>
	<div class="header">
		<div class="htitle">
			Audit Trail as of <?php echo Carbon\Carbon::now()->format('M j, Y h:i A'); ?>
		</div>
		<div class="himg">
     		 <img src="img/maybankheader.jpg" width="45%" >
 		</div>
	</div>
	<div class="content">
		<table class="table-head">
			<tr> 
				<th colspan="2"> <b>Updates</b> </th> 
			</tr>
		</table>
			
		@include('includes.audit_trail_updates')

		<table class="table-head">
			<tr> 
				<th colspan="2"> <b>Actions</b> </th> 
			</tr>
		</table>

		@include('includes.audit_trail_actions')
		
	</div>

	<div class="footer">
	    Page <span class="pagenum"></span>
	</div>