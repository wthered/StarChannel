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
<div class = "container">
	<div class = "box">
		{{ Auth::user()->name }}
		<form action = "{{ route('logout') }}" method = "POST">
			@csrf
			<button type = "submit">Logout</button>
		</form>
	</div>
</div>
<div class = "container">
	<div class = "row">
		<div class = "col-3">
			<a href = "{{ route('create.article') }}" class = "btn btn-link btn-article">Create Article</a>
			<a href = "{{ route('create.category') }}" class = "btn btn-link btn-article">Create Category</a>
			<a href = "{{ route('create.tag') }}" class = "btn btn-link btn-article">Create Tag</a>
		</div>
		<div class = "col-9">
			<div class = "container" style = "padding: 1rem 0">
				@foreach($articles as $article)
					<div class = "row">
						<div class = "col-6">
							<img src = "{{ $article->image ? url('images/' . $article->image) : 'https://image.tmdb.org/t/p/original/zKv7KF0pH9ASv2uGgTvTylMlxQn.jpg' }}" alt = "Article Image" class = "img-fluid">
						</div>
						<div class = "col-6">
							<h6 class = "title-list">{{ $article->subtitle }}</h6>
							<h3 class = "title-main">{{ $article->title }}</h3>
							<p class="article-body">{{ $article->body }}</p>
							<div class = "rest">
								<a href = "{{ route('view.article', ['category' => 2, 'article' => $article->article_id, 'slug' => $article->slug]) }}" class = "btn btn-style">View</a>
								<a href = "{{ route('edit.article', ['article' => $article->article_id]) }}" class="btn btn-style">Edit</a>
								<a href = "{{ route('delete.article', ['article' => $article->article_id]) }}" class="btn btn-style">Delete</a>
								<a href = "{{ route('assign.tag', ['article' => $article->article_id]) }}" class="btn btn-style">Tag</a>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>

</body>
</html>
