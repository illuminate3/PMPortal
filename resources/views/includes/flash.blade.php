				
@if (Session::has('flash_important') )
	<div class="alert alert-danger">		
			{{ Session::get('flash_important') }}		
	</div>
@endif 


@if (Session::has('flash_confirmation'))
		<div class="alert alert-success">
				{{ Session::get('flash_confirmation')}}
		</div>
@endif

	