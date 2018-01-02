@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			@forelse($noticias as $noticia)
			<div class="jumbotron">
				<h2>{{ $noticia->titulo }}</h2>
				<p>
					@if(strlen($noticia->corpo) > 400)
						{!! substr(nl2br($noticia->corpo), 0, 400).'...' !!}
					@else
						{!! nl2br($noticia->corpo) !!}
					@endif
				</p>
				<p>
					<a href="{{ route('noticias.show', $noticia->id) }}" class="btn btn-primary btn-lg">
						Leia mais
					</a>
				</p>
			</div>
			@empty
				<h1 class="text-center">Não há notícias no momento</h1>
			@endforelse
		</div>
	</div>
</div>
@endsection