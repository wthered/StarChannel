<?php

	namespace App\Http\Controllers;

	use App\Models\Article;
	use App\Models\Category;
	use Illuminate\Contracts\Support\Renderable;
	use Illuminate\Http\Request;

	class HomeController extends Controller {
		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct() {
			$this->middleware('auth');
		}

		/**
		 * Show the application dashboard.
		 *
		 * @param Request $r
		 *
		 * @return Renderable
		 */
		public function index(Request $r): Renderable {
			$greece = Category::where('category_id', 2)->first();
			$greece['articles'] = $greece->articles()->get();
			$article_list = array();
			foreach ($greece['articles'] as $article) {
				$article_list[] = Article::find($article->article_id);
			}
			return view('welcome', ['greece' => $greece, 'articles' => $article_list]);
		}
	}
