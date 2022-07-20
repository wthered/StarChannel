<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv = "X-UA-Compatible" content = "ie=edge">
	<title>Single Page</title>
	<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
	<link rel = "preconnect" href = "https://fonts.googleapis.com">
	<link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
	<link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap">
	<link rel = "stylesheet" href = "{{ asset('css/app.css') }}">
</head>
<body>

<div class = "container">
	<div id = "left-panel">
		<h1>{{ $article->title }}</h1>
		<h2>{{ $article->subtitle }}</h2>
		<div id = "info">
			<img src = "{{ !empty($article->image) ? $article->image : 'https://scdn.star.gr/images/articles/660/202207/62d7b607aa9cc.jpg' }}" alt = "Article Image not found">
			<div id = "rest">
				<p>{{ $article->body }}</p>
			</div>
		</div>
	</div>
	<div id = "info-panel">
		<div id = "categoryPanel">
			<div class = "panel-header">
				<h1>Category</h1>
			</div>
			{{ $category->category_title }}
		</div>
		<div id = "tags">
			<div class = "panel-header">
				<h1>Tags</h1>
			</div>
			<ul id = "tag-list">
				@foreach($tags as $tag)
					<li class = "tag">{{ $tag->tag_name }}</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
</body>
</html>