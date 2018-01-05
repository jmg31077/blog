@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Notícias sobre "{{ $categoria->nome }}"</h1>
			<hr>
			@forelse($categoria->noticias->sortByDesc('created_at') as $noticia)
			<div class="jumbotron">
				<h2>{{ $noticia->titulo }}</h2>
				@if(isset($noticia->caminho_de_imagem))
					<p>
						<img src="{{asset($noticia->caminho_de_imagem)}}" class="img-responsive">
					</p>
				@endif
				<p>
					@if(strlen($noticia->corpo) > 400)
						{!! substr(nl2br($noticia->corpo), 0, 400).'...' !!}
					@else
						{!! nl2br($noticia->corpo) !!}
					@endif
				</p>
				<small>
					<i> Categoria(s): </i>
					@foreach($noticia->categorias as $categoria)
						<a href="{{ route('categorias.related_news', $categoria->id) }}" class="btn btn-primary btn-xs">
							{{ $categoria->nome }}
						</a>
					@endforeach
				</small>
				<hr />
				<p>
					<a href="{{ route('noticias.show', $noticia->id) }}" class="btn btn-primary btn-lg">
						Leia mais
					</a>
				</p>
			</div>
			@empty
				<h3 class="text-center">Não há notícia sobre {{ $categoria->nome }}</h3>
			@endforelse
		</div>
	</div>
</div>
@endsection