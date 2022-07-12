<?php

	namespace App\Http\Controllers;

	use App\Http\Requests\StoreCategoryRequest;
	use App\Models\Category;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Routing\Redirector;
	use Illuminate\Support\Str;

	class CategoryController extends Controller {

		// Show the form to create Category
		public function create(): string {
			return view('admin.category.create');
		}

		// Actually create the Category
		public function store(StoreCategoryRequest $request): Application|RedirectResponse|Redirector {
			$name = $request->input('category_name');
			$slug = !empty($request->input('category_text')) ? Str::slug($request->input('category_text')) : Str::slug($name);
			Category::create([
				'category_title' => $name,
				'category_slug' => $slug,
			]);
			return redirect(route('create.category'))->with('status', 'Category Created');
		}
	}
