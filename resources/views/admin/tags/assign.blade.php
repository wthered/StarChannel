<!doctype html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv = "X-UA-Compatible" content = "ie=edge">
	<title>Assign</title>
	<meta name = "csrf-token" content = "{{ csrf_token() }}" />
	<link rel = "stylesheet" href = "{{ asset('css/tags/assign.css') }}">
	<link rel = "preconnect" href = "https://fonts.googleapis.com">
	<link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
	<link rel = "stylesheet" href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap">
</head>
<body>
<div class = "container">
	<form action = "{{ route('save.tag', ['article' => $article]) }}" method = "POST">
		@foreach($tags as $tag)
			<div class = "box">
				@foreach($enabled as $active)
					@if($active->tag_id == $tag->id)
						<input type = "checkbox" id = "{{ $tag->tag_name }}" name = "tags[]" value = "{{ $tag->id }}" checked>
						@break
					@endif
				@endforeach
				<label for = "{{ $tag->tag_name }}">{{ $tag->tag_name }}</label>
			</div>
		@endforeach
		@csrf
		<div id = "buttons">
			<button type = "submit" class = "btn btn-submit">Assign</button>
			<a href = "{{ route('panel.index') }}" class = "btn btn-submit">Back to the Panel</a>
		</div>
	</form>
</div>
</body>
</html>
