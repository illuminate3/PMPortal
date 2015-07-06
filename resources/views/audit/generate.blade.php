<head>
	<title>Audit Trail</title>
	<link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
	<style type="text/css">
		.header {
			width: 100%;
		    position: fixed;
		    top: -50px;
		    height: 50px;
			background-color: white;
		    border-bottom: 1px solid black;
		}
		.htitle{
			width: 50%;
			height: 50px;
			left: 10px;
			top:0px;
			position: absolute;
  			padding-top: 25px;
		}
		.himg{
			width: 50%;
			text-align: right;
			position: absolute;
			right: 10px;
			top:0px;
			height: 50px;
			vertical-align: text-bottom;
		}
		.footer {
		    bottom: 0px;
		    width: 100%;
		    position: fixed;
		    text-align: right;
		}
		.pagenum:before {
		    content: counter(page); 
		}
		 @page { margin: 70px; }
			
		.details
		{
			margin-left: 3px;
		}
	</style>
</head>
<body>
	<div class="header">
		<div class="htitle">
			Audit Trail as of <?php echo Carbon\Carbon::now()->format('F j Y h:i A'); ?>
		</div>
		<div class="himg">
     		 <img src="img/maybankheader.jpg" width="45%" >
 		</div>
	</div>

	<div class="content">
		
<div class="container panel panel-default full">
			<div class="panel-body">
				<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> 
					<th colspan="2"> <b>Updates</b> </th> 
				</tr>
			</tbody> </table>
			</div>
			@include('includes.audit_trail_updates')

			<div class="panel-body">
				<table class="etable table-condensed table-hover project-show table-head"> <tbody>
				<tr> 
					<th colspan="2"> <b>Actions</b> </th> 
				</tr>
			</tbody> </table>
			</div>
			@include('includes.audit_trail_actions')
		</div>

	</div>
	<div class="footer">
	    Page <span class="pagenum"></span>
	</div>