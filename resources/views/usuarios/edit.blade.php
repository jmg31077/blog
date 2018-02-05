@extends('layouts.panel')

@section('page-title', 'Atualizar dados | '.$usuario->name)

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <div class="form-group">
        <label for="nome" class="col-md-4 control-label">Nome</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="nome" value="{{ old('nome', $usuario->name) }}" required autofocus>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-md-4 control-label">E-Mail</label>

        <div class="col-md-6">
            <input type="email" class="form-control" name="email" value="{{ old('email', $usuario->email) }}" required>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-success btn-xs">
                Salvar
            </button>

            <a class="btn btn-danger btn-xs" href="{{ url()->previous() }}">
                Cancelar
            </a>
        </div>
    </div>
</form>
@endsection
