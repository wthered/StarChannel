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
			<a href = "{{ route('create.article') }}" class = "btn btn-link btn-article">Create Article</a>
			<a href = "{{ route('create.category') }}" class = "btn btn-link btn-article active">Create Category</a>
		</div>
		<div class = "col-md-9">
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif
			<form action = "{{ route('store.category') }}" method = "POST">
				<div class = "mt-3">
					<label for = "categoryName" class = "form-label">Category Title</label>
					<input type = "text" class = "form-control" id = "categoryName" placeholder = "Category Title" name="category_name">
				</div>
				<div class = "my-3">
					<label for = "categoryText" class = "form-label">Another label</label>
					<input type = "text" class = "form-control" id = "categoryText" placeholder = "Category Slug" name="category_text">
				</div>
				<div class = "mb-3">
					@csrf
					<button type = "submit" class = "btn btn-outline-info" style = "width: 100%">Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
