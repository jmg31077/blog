<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{ $noticia->titulo }}</title>
</head>
<body>
	<h1>{{ $noticia->titulo }}</h1>
	<p>
		<small>
			Criado por {{ $noticia->usuario->name }}
		</small>
	</p>
	@if(isset($noticia->caminho_de_imagem))
		<img src="{{ public_path($noticia->caminho_de_imagem) }}" class="img">
	@endif

	<p>
		{{ $noticia->corpo }}
	</p>
</body>
</html>