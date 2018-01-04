@extends('layouts.panel')

@section('page-title', 'Criar categoria')

@section('content')
<form action="" method="POST">
	{{ csrf_field() }}

	<div class="form-group">
		<label for="nome">Nome:</label>
		<input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
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