<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv = "X-UA-Compatible" content = "ie=edge">
	<meta name = "csrf-token" content = "{{ csrf_token() }}" />
	<link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" />
	<link rel = "stylesheet" href = "{{ asset('css/panel.css') }}">
	<title>Administration Panel</title>
</head>
<body>
<div class = "container">
	<div class = "row">
		<div class = "col-md-3">
			<a href = "{{ route('create.article') }}" class = "btn btn-link btn-article active">Create Article</a>
			<a href = "{{ route('create.category') }}" class = "btn btn-link btn-article">Create Category</a>
		</div>
		<div class = "col-md-9">
			@if ($errors->any())
				<ul class = "list-group mt-3 mb-0">
					@foreach ($errors->all() as $error)
						<li class = "list-group-item list-item-warning">{{ $error }}</li>
					@endforeach
				</ul>
			@endif
			@if (session('status'))
				<div class = "alert alert-success">
					{{ session('status') }}
				</div>
			@endif
			<form action = "{{ route('article.store') }}" method = "POST">
				<div class = "mt-3">
					<label for = "articleTitle" class = "form-label">Title</label>
					<input type = "text" class = "form-control" id = "articleTitle" placeholder = "Article Title" name = "title">
				</div>
				<div class = "my-3">
					<label for = "articleSubtitle" class = "form-label">Subtitle</label>
					<input type = "text" class = "form-control" id = "articleSubtitle" placeholder = "Article Subtitle" name = "subtitle">
				</div>
				<div class = "my-3">
					<label for = "articleSlug" class = "form-label">Slug</label>
					<input type = "text" class = "form-control" id = "articleSlug" placeholder = "Article Slug" name = "slug">
				</div>
				<div class = "my-3">
					<label for = "articleBody" class = "form-label">Body</label>
					<textarea class = "form-control" id = "articleBody" placeholder = "Article Body Text" rows = "8" name = "body"></textarea>
				</div>
				<div class = "my-3">
					<label for = "articleCategory" class = "form-label">Category</label>
					<select id = "articleCategory" class = "form-select" name = "category">
						<option selected>Choose...</option>
						@foreach($categories as $category)
							<option value = "{{ $category->category_id }}">{{ $category->category_title }}</option>
						@endforeach
					</select>
				</div>
				@csrf
				<div class = "mb-3">
					<button type = "submit" class = "btn btn-outline-info" style = "width: 100%">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
