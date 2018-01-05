@extends('layouts.panel')

@section('page-title', 'Editar categoria')

@section('content')
<form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}

	<div class="form-group">
		<label for="nome">Nome:</label>
		<input type="text" name="nome" class="form-control" value="{{ old('nome', $categoria->nome) }}">
	</div>
	
	<hr />

	<button type="submit" class="btn btn-success btn-xs">
		<i class="fa fa-check" aria-hidden="true"></i> salvar
	</button>
	<button type="reset" class="btn btn-danger btn-xs">
		<i class="fa fa-eraser" aria-hidden="true"></i> limpar
	</button>
	
</form>
@endsection