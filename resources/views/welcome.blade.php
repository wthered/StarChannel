<!DOCTYPE html>
<html lang = "{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Nunito&display=swap">

	<!-- Styles -->
	<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">

	<link rel = "stylesheet" href = "{{ asset('css/welcome.css') }}">
</head>
<body>
<div class = "container">
	<div class = "row">
		<div class = "greece">
			<div class = "card">
				<div class = "card-header">
					Greece
				</div>
				<div class = "card-body">
					@foreach($articles as $article)
						<a href = "#" class="btn btn-link">{{ $article->title }}</a>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div class = "row">
		<div class = "world">World</div>
	</div>
	<div class = "row">
		<div class = "politics">politics</div>
	</div>
	<div class = "row">
		<div class = "finance">finance</div>
	</div>
</div>
</body>
</html>
