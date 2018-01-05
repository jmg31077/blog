@extends('layouts.panel')

@section('page-title', 'Todas as categorias')

@section('content')
<table class="table table-hover">
	<tr>
		<th>Nome</th>
		<th>Ações</th>
	</tr>
	@forelse($categorias as $categoria)
		<tr>
			<td>{{ $categoria->nome }}</td>
			<td>
				<a href="{{ route('categorias.show', $categoria->id) }}" class="btn btn-default btn-xs">
					<i class="fa fa-search" aria-hidden="true"></i>
				</a>
				<a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-success btn-xs">
					<i class="fa fa-pencil" aria-hidden="true"></i>
				</a>
				<button type="submit" class="btn btn-danger btn-xs" form="categoria-destroy{{$categoria->id}}">
					<i class="fa fa-trash-o" aria-hidden="true"></i>
				</button>
			</td>
		</tr>

		<form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" id="categoria-destroy{{$categoria->id}}">
			{{ csrf_field() }}
			{{ method_field('DELETE') }}
		</form>
	@empty
		<tr>
			<td colspan="2" class="h2">Não há categorias cadastradas</td>
		</tr>
	@endforelse
</table>
@endsection