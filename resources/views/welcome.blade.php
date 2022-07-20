<!DOCTYPE html>
<html lang = "{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fonts -->
	<link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Nunito&display=swap">

	<!-- Styles -->
	<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
	<link rel = "stylesheet" href = "{{ asset('css/welcome.css') }}">
</head>
<body>
<div class="container">
	<div class="box">
		<span id="user">{{ Auth::user()->name }}</span>
		<form action = "{{ route('logout') }}" method="POST">
			@csrf
			<button type="submit">Logout</button>
		</form>
	</div>
</div>
<div class = "articles">
	<div class = "row">
		<div class = "category greece">Greece
			<div class = "row">
				@foreach($articles as $article)
					<div class = "col-6">
						<div class = "card">
							<div class = "card-header">
								<a href = "#">
									<img class = "card-img-bottom radius-image" src = "{{ !empty($article->image) ? url('/images/'.$article->image) : 'https://image.tmdb.org/t/p/original/zKv7KF0pH9ASv2uGgTvTylMlxQn.jpg'}}" alt = "Card image cap">
								</a>
								<div class = "post-pos">
									<a href = "#" class = "recipe orange">Ελλάδα</a>
								</div>
							</div>
							<div class = "card-body blog-details">
								<a href = "{{ route('view.article', ['category' => $greece, 'article' => $article->article_id, 'slug' => $article->slug]) }}" class = "blog-desc">{{ $article->title }}</a>
								<p>{{ $article->subtitle }}</p>
								<div class = "p-footer">
									<a href = "{{ route('view.article', ['category' => 'greece', 'article' => $article->article_id, 'slug' => $article->slug]) }}" class = "read">Read more&nbsp;
										<span class = "fas fa-arrow-right" aria-hidden = "true"></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class = "row">
		<div class = "category world">World</div>
	</div>
	<div class = "row">
		<div class = "category politics">politics</div>
	</div>
	<div class = "row">
		<div class = "category finance">finance</div>
	</div>
</div>
</body>
</html>
