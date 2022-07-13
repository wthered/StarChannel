<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv = "X-UA-Compatible" content = "ie=edge">
	<meta name = "csrf-token" content = "{{ csrf_token() }}" />
	<link rel = "stylesheet" href = "{{ asset('css/panel.css') }}">
	<title>Administration Panel</title>
</head>
<body>
<div class="container">
	<div class="box">
		{{ Auth::user()->name }}
		<form action = "{{ route('logout') }}" method="POST">
			@csrf
			<button type="submit">Logout</button>
		</form>
	</div>
</div>
<div class = "container">
	<div class = "row">
		<div class = "col-3">
			<a href = "{{ route('create.article') }}" class = "btn btn-link btn-article">Create Article</a>
			<a href = "{{ route('create.category') }}" class = "btn btn-link btn-article">Create Category</a>
		</div>
		<div class = "col-9">
			<div class = "container" style = "padding: 1rem 0">

				@foreach($articles as $article)
					<div class = "row">
						<div class = "col-6">
							<img src = "https://image.tmdb.org/t/p/original/zKv7KF0pH9ASv2uGgTvTylMlxQn.jpg" alt = "Article Image" class = "img-fluid">
						</div>
						<div class = "col-6 rest">
							<h6 class = "title-list">{{ $article->subtitle }}</h6>
							<h3 class = "title-main">{{ $article->title }}</h3>
							<p>{{ $article->body }}</p>
							<a href = "{{ route('view.article', ['category' => 2, 'article' => $article->article_id, 'slug' => $article->slug]) }}" class = "btn btn-style">Learn
								More</a>
						</div>
					</div>
				@endforeach

			</div>
		</div>
	</div>
</div>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
