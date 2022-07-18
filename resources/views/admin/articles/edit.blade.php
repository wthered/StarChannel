<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv = "X-UA-Compatible" content = "ie=edge">
	<meta name = "csrf-token" content = "{{ csrf_token() }}" />
	<title>Document</title>
	<link rel = "stylesheet" href = "{{ asset('css/articles/alter.css') }}">
</head>
<body>
<div class = "container">
	<div class = "row">
		@if ($errors->any())
			<div class="alert">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<form action = "{{ route('update.article', ['article' => $article->article_id]) }}" method = "POST" enctype="multipart/form-data">
			<div class = "form-item">
				<label for = "updateTitle" class = "form-label">Title</label>
				<input type = "text" class = "form-control" id = "updateTitle" placeholder = "Article Title" value = "{{ $article->title }}" name="ArticleTittle">
			</div>
			<div class = "form-item">
				<label for = "updateSubtitle" class = "form-label">Subtitle</label>
				<input type = "text" class = "form-control" id = "updateSubtitle" placeholder = "Article Subtitle" value = "{{ $article->subtitle }}" name="ArticleSubtitle">
			</div>
			<div class = "form-item">
				<label for = "updateBody" class = "form-label">Body</label>
				<textarea class = "form-control" id = "updateBody" placeholder = "Article Body Text" name="ArticleBody">{{ $article->body }}</textarea>
			</div>
			<div class = "form-item">
				<div class="image-box">
					<img src = "{{ $article->image }}" alt = "Article Image" class="image" />
				</div>
				<label for = "updateImage" class = "form-label">Image</label>
				<input type = "file" class = "form-control" id = "updateImage" name="ArticleImage">
			</div>
			<div class = "form-item">
				<label for = "updateCategory" class = "form-label">Category</label>
				<select name = "articleCategory" id = "updateCategory" class = "form-select">
					@foreach($categories as $category)
						@if($category->category_id == $articleCategory->category_id)
							<option value = "{{ $articleCategory->category_id }}" selected>{{ $category->category_title }}</option>
						@else
							<option value = "{{ $category->category_id }}">{{ $category->category_title }}</option>
						@endif
					@endforeach
				</select>
			</div>
			@csrf
			<button type = "submit" class = "btn btn-save">Save</button>
		</form>
	</div>
</div>
</body>
</html>
