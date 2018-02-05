@extends('layouts.panel')

@section('page-title', 'Todos os usuarios')

@section('content')
<table class="table">
	<tr>
		<th>Nome</th>
		<th>Email</th>
		<th>Notícias</th>
		<th>Ações</th>
	</tr>
	@foreach($usuarios as $usuario)
		<tr>
			<td>{{ $usuario->name }}</td>
			<td>{{ $usuario->email }}</td>
			<td>
				{{ $usuario->noticias->count() }}
				<a href="{{ route('usuarios.news', $usuario->id) }}" class="btn btn-primary btn-xs">
					ver todas
				</a>
			</td>
			<td>
				<a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-xs btn-success">editar</a>
			
				<button type="submit" form="usuario-destroy{{$usuario->id}}" class="btn btn-xs btn-danger">
					excluir
				</button>
			</td>
		</tr>

		<form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" id="usuario-destroy{{$usuario->id}}">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}			
		</form>
	@endforeach
</table>
@endsection