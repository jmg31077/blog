@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well well-lg">
				<h1>{{ $noticia->titulo }}</h1>
				<p>
					<small>
						Criado em {{ date('d/m/Y', strtotime($noticia->created_at)) }}
						por {{ $noticia->usuario->name }} 
					</small>
				</p>
				<p>
					{!! nl2br($noticia->corpo) !!}
				</p>
			</div>
		</div>
	</div>
</div>
@endsection