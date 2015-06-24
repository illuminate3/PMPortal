<head>
	<title>{{ $project-> title }} - {{ $project-> updated_at }}</title>
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
			
	</style>
</head>
<body>
	<div class="header">
		<div class="htitle">
			<b>{{ $project-> title }}</b>
		</div>
		<div class="himg">
     		 <img src="img/maybankheader.jpg" width="45%" >
 		</div>
	</div>

	<div class="content">
		<h1>{{ $project-> title }}</h1>
		{{ $project-> updated_at }} <br /> <br />

		Target Date: {{ $project-> target_date }} <br />
		Project Status: {{ $project-> status }}
		 - 
		 @if ($project-> color == "Green")
			<img src="{{ asset('img/green.png') }}" class="color-img">
		@elseif ($project-> color == "Amber")
			<img src="{{ asset('img/amber.png') }}" class="color-img">
		@elseif ($project-> color == "Red")
			<img src="{{ asset('img/red.png') }}" class="color-img">
		@elseif ($project-> color == "Blue")
			<img src="{{ asset('img/blue.png') }}" class="color-img">
		@endif
		 <br />
		Rationale: {{ $project-> rationale }} <br /> <br />

		Milestones: <br />
		<table class="border full">
			<thead>
				<tr>
					<th width="40%" class="border">Milestone</th>
					<th width="10% "class="border">Status</th>
					<th width="20%" class="border">Target Date</th>
					<th width="20%" class="border">Actual Date</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($milestones as $milestone)
				<tr>
					<td class = "border">{{ $milestone-> milestone }}</td>
					<td class = "border" align ="center">{{ $milestone-> status }} </td>
					<td class = "border" align ="center">{{ $milestone-> target_date }}</td>
					<td class = "border" align ="center">{{ $milestone -> actual_date }} </td>
				</tr>
			@endforeach
			</tbody>
		</table> <br />

		Last Week's Accomplishments <br />
		<ul>
			@foreach ($accomplishments as $accomplishment)
				<li>{{ $accomplishment-> accomplishment }}</li>
			@endforeach
		</ul> <br />

		Week's Action Items <br />
		<table class="border full">
			<?php $number = 1 ?>
			<thead>
				<tr>
					<th width="5%"  class="border">#</th>
					<th width="25%"  class="border" width="30%">Action Item</th>
					<th width="10%" class="border">Status</th>
					<th width="15%" class="border">Owner</th>
					<th width="15%" class="border">Target Date</th>
					<th width="30%" class="border" width="30%">Comments</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($actions as $action)
				<tr>
					<td class = "border" align ="center">{{ $number }}</td>
					<td class = "border">{{ $action-> action_item }}</td>
					<td class = "border" align ="center">{{ $action-> status }} </td>
					<td class = "border" align ="center">{{ $action-> owner }}</td>
					<td class = "border" align ="center">{{ $action -> target_date }} </td>
					<td class = "border">{{ $action -> comment }} </td>
				</tr>
				<?php $number = $number + 1 ?>
			@endforeach
			</tbody>
		</table> <br />

		Issues <br />
		<table class="border full">
			<?php $number = 1 ?>
			<thead>
				<tr>
					<th width="5%" class="border">#</th>
					<th width="25%" class="border" width="35%">Issue</th>
					<th width="10%" class="border">Status</th>
					<th width="15%" class="border">Severity</th>
					<th width="15%" class="border">Owner</th>
					<th width="30%" class="border" width="35%">Comments</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($issues as $issue)
				<tr>
					<td class = "border" align ="center">{{ $number }}</td>
					<td class = "border">{{ $issue-> issue }}</td>
					<td class = "border" align ="center">{{ $issue-> status }} </td>
					<td class = "border" align ="center">{{ $issue-> severity }}</td>
					<td class = "border" align ="center">{{ $issue -> owner }} </td>
					<td class = "border">{{ $issue -> comment }} </td>
				</tr>
				<?php $number = $number + 1 ?>
			@endforeach
			</tbody>
		</table> <br />

		Risks <br />
		<table class="border full">
			<?php $number = 1 ?>
			<thead>
				<tr>
					<th width="5%"  class="border">#</th>
					<th width="25%" class="border" width="35%">Risk</th>
					<th width="20%" class="border">Impact</th>
					<th width="20%" class="border">Probability</th>
					<th width="30%" class="border" width="35%">Mitigation</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($risks as $risk)
				<tr>
					<td class = "border" align ="center">{{ $number }}</td>
					<td class = "border">{{ $risk-> risk }}</td>
					<td class = "border" align ="center">{{ $risk-> impact }} </td>
					<td class = "border" align ="center">{{ $risk-> probability }}</td>
					<td class = "border">{{ $risk -> mitigation }} </td>
				</tr>
				<?php $number = $number + 1 ?>
			@endforeach
			</tbody>
		</table> <br />

		Expenses <br />
		<table class="border full">
			<?php $number = 1 ?>
			<thead>
				<tr>
					<th width="5%"  class="border">#</th>
					<th width="25%" class="border" width="35%">Item</th>
					<th width="20%" class="border">Amount</th>
					<th width="20%" class="border">Balance</th>
					<th width="30%" class="border" width="35%">Comments</th>
				</tr>
			</thead>
			<tbody>
			@foreach ($expenses as $expense)
				<tr>
					<td class = "border" align ="center">{{ $number }}</td>
					<td class = "border">{{ $expense-> item }}</td>
					<td class = "border" align ="center">{{ $expense-> amount }} </td>
					<td class = "border" align ="center">{{ $expense-> balance }}</td>
					<td class = "border">{{ $expense -> comment }} </td>
				</tr>
				<?php $number = $number + 1 ?>
			@endforeach
			</tbody>
		</table> <br />
	</div>
	<div class="footer">
	    Page <span class="pagenum"></span>
	</div>

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
