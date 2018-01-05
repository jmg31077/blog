@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="well well-lg">
				<h1>{{ $noticia->titulo }}</h1>
				@if(isset($noticia->caminho_de_imagem))
					<p>
						<img src="{{asset($noticia->caminho_de_imagem)}}" class="img-responsive">
					</p>
				@endif
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