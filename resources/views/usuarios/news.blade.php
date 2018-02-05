@extends('layouts.panel')

@section('page-title', 'Noticias criadas por '.$usuario->name)

@section('content')
<table class="table">
	<tr>
		<th>Titulo</th>
		<th>Corpo</th>
		<th>Categoria(s)</th>
		<th>Autor</th>
		<th>Ações</th>
	</tr>
	@forelse($usuario->noticias->sortByDesc('created_at') as $noticia)
		<tr>
			<td>{{ strlen($noticia->titulo) > 20 ? substr($noticia->titulo, 0, 20).'...':$noticia->titulo}}</td>
			<td>{{ strlen($noticia->corpo) > 40 ? substr($noticia->corpo, 0, 40).'...':$noticia->corpo }}</td>
			<td>
				@foreach($noticia->categorias as $categoria)
					{{ $categoria->nome }} <br>
				@endforeach
			</td>
			<td>{{ $usuario->name }}</td>
			<td>
				<a href="{{ route('noticias.show', $noticia->id) }}" class="btn btn-xs btn-success">ver</a>
			</td>
		</tr>
	@empty

		<tr>
			<td colspan="4"><h3>Não há notícias</h3></td>
		</tr>	

	@endforelse
</table>
@endsection