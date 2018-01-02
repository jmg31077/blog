@extends('layouts.panel')

@section('page-title', 'Editar notícia')

@section('content')

<form action="{{ route('noticias.update', $noticia->id) }}" method="POST">
	{{ csrf_field() }}
	{{ method_field('PUT') }}

	<div class="form-group">
		<label for="titulo">Titulo:</label>
		<input type="text" name="titulo" value="{{ old('titulo', $noticia->titulo) }}" class="form-control">
	</div>

	<div class="form-group">
		<label for="corpo">Corpo:</label>
		<textarea name="corpo" cols="30" rows="10" class="form-control">{{ old('corpo', $noticia->corpo) }}</textarea>
	</div>

	<hr>

	<button type="submit" class="btn btn-success btn-xs">salvar</button>
	<button type="reset" class="btn btn-danger btn-xs">limpar</button>
</form>

@endsection