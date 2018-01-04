@extends('layouts.panel')

@section('page-title', 'Todas as notícias')

@section('content')
<table class="table">
	<tr>
		<th>Titulo</th>
		<th>Corpo</th>
		<th>Categoria(s)</th>
		<th>Autor</th>
		<th>Ações</th>
	</tr>
	@forelse($noticias as $noticia)
		<tr>
			<td>{{ strlen($noticia->titulo) > 20 ? substr($noticia->titulo, 0, 20).'...':$noticia->titulo}}</td>
			<td>{{ strlen($noticia->corpo) > 40 ? substr($noticia->corpo, 0, 40).'...':$noticia->corpo }}</td>
			<td>
				@foreach($noticia->categorias as $categoria)
					{{ $categoria->nome }} <br>
				@endforeach
			</td>
			<td>{{ $noticia->usuario->name }}</td>
			<td>
				<a href="{{ route('noticias.edit', $noticia->id) }}" class="btn btn-xs btn-success">editar</a>
			
				<button type="submit" form="noticia-destroy{{$noticia->id}}" class="btn btn-xs btn-danger">
					excluir
				</button>
			</td>
		</tr>

		<form action="{{ route('noticias.destroy', $noticia->id) }}" method="POST" id="noticia-destroy{{$noticia->id}}">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}			
		</form>
	@empty

		<tr>
			<td colspan="4"><h3>Não há notícias</h3></td>
		</tr>	

	@endforelse
</table>
@endsection