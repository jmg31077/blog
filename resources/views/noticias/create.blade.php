@extends('layouts.panel')

@section('page-title', 'Criar notícia')

@section('content')

<form action="{{ route('noticias.store') }}" method="POST">
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
    	<label for="categorias">Categoria(s):</label>
    	<select name="categorias[]" class="select2" style="width:100%;" multiple>
    		<option value="exemplo1">Exemplo 1</option>
    		<option value="exemplo2">Exemplo 2</option>
    		<option value="exemplo3">Exemplo 3</option>
    	</select>
    </div>
	<hr>

	<button type="submit" class="btn btn-success btn-xs">salvar</button>
	<button type="reset" class="btn btn-danger btn-xs">limpar</button>
</form>

@endsection