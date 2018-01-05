@extends('layouts.panel')

@section('page-title', 'Editar notícia')

@section('content')

<form action="{{ route('noticias.update', $noticia->id) }}" method="POST" enctype="multipart/form-data">
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

	<div class="form-group">
		<label for="imagem">Imagem:</label>
		@if(isset($noticia->caminho_de_imagem))
			<img src="{{ asset($noticia->caminho_de_imagem) }}" class="img-responsive">
		@endif
		<input type="file" name="imagem" class="form-control">
	</div>

	<div class="form-group">
    	<label for="categorias">Categoria(s):</label>
    	<select name="categorias[]" class="select2" style="width:100%;" multiple>
    		@foreach($categorias as $categoria)
    			<option value="{{ $categoria->id }}" {{ in_array($categoria->id, $ids_de_categorias_relacionadas) ? 'selected' : '' }}>
    				{{ $categoria->nome }}
    			</option>
    		@endforeach
    	</select>
    </div>

	<hr>

	<button type="submit" class="btn btn-success btn-xs">salvar</button>
	<button type="reset" class="btn btn-danger btn-xs">limpar</button>
</form>

@endsection