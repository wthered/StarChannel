@extends('layouts.app')

@section('content')
	<div class = "container">
		<div class = "row">
			<div class = "col-md-9">
				<h1>{{ $article->title }}</h1>
				<h2>{{ $article->subtitle }}</h2>
				<p>{{ $article->body }}</p>
			</div>
			<div class = "col-md-3">
				<div class = "sidebar-sticky">
					<div class = "sidebar-sticky-fix">
						<!-- Tags Widget-->
						<div class = "sidebar-widget popular-tags">
							<div class = "sidebar-title">
								<h4>Category</h4>
							</div>
							<span class="category">{{ $category }}</span>
						</div>

					</div>
				</div>
			</div>
		</div>

	</div>

	<div class = "container">
		<div class = "row">

		</div>
	</div>

@endsection