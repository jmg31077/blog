@if (Session::has('success'))
	<div class="alert alert-success text-center" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<i class="fa fa-check-square-o" aria-hidden="true"></i> {!!Session::get('success')!!}
	</div>		
@endif

@if ((isset($errors)) && ($errors->count() > 0))
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		@foreach ($errors->all() as $error)
			<dd>{!! $error !!}</dd>
		@endforeach
	</div>
@endif