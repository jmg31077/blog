@extends('layouts.panel')

@section('page-title', 'Criar notícia')

@section('content')

<form action="{{ route('noticias.store') }}" method="POST" enctype="multipart/form-data">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="titulo">Titulo:</label>
		<input type="text" name="titulo" value="{{ old('titulo') }}" class="form-control">
	</div>

	<div class="form-group">
		<label for="corpo">Corpo:</label>
		<textarea name="corpo" cols="30" rows="10" class="form-control">{{ old('corpo') }}</textarea>
	</div>

	<div class="form-group">
		<label for="imagem">Imagem:</label>
		<input type="file" name="imagem" class="form-control">
	</div>
    
    <div class="form-group">
    	<label for="categorias">Categoria(s):</label>
    	<select name="categorias[]" class="select2" style="width:100%;" multiple>
    		@foreach($categorias as $categoria)
    			<option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
    		@endforeach
    	</select>
    </div>
	<hr>

	<button type="submit" class="btn btn-success btn-xs">salvar</button>
	<button type="reset" class="btn btn-danger btn-xs">limpar</button>
</form>

@endsection