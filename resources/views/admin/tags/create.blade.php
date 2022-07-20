<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv = "X-UA-Compatible" content = "ie=edge">
	<title>Create Tag</title>
	<meta name = "csrf-token" content = "{{ csrf_token() }}" />
	<link rel = "stylesheet" href = "{{ asset('css/tags.css') }}">
	<link rel = "preconnect" href = "https://fonts.googleapis.com">
	<link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
	<link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap">
</head>
<body>
@if (Session::has('message'))
	<ul id = "messageBox">
		<li id = "messageLine">{{ Session::get('message') }}</li>
	</ul>
@endif

@if ($errors->any())
	<ul>
		@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	</ul>
@endif
<div class = "box">
	<form action = "{{ route('store.tag') }}" method = "POST">
		<div class = "form-line">
			<label for = "tagName">Tag Name</label>
			<input type = "text" id = "tagName" name = "tag">
		</div>
		<div class = "form-line">
			@csrf
			<button type = "submit" class = "btn btn-tag">Save Tag</button>
			<a href = "{{ route('panel.index') }}" class = "btn btn-tag">Admin Panel</a>
		</div>
	</form>
</div>
</body>
</html>
