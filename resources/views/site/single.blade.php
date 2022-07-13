<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv = "X-UA-Compatible" content = "ie=edge">
	<title>Single Page</title>
	<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
	<link rel = "stylesheet" href = "{{ asset('css/app.css') }}">
</head>
<body>

<div class="container">
	<h1>{{ $article->title }}</h1>
	<h2>{{ $article->subtitle }}</h2>
</div>
</body>
</html>