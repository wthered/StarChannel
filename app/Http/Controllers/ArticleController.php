<?php

	namespace App\Http\Controllers;

	use App\Http\Requests\StoreArticleRequest;
	use App\Http\Requests\UpdateArticleRequest;
	use App\Models\Article;
	use App\Models\ArticleCategory;
	use App\Models\ArticleTag;
	use App\Models\Category;
	use App\Models\Tag;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Routing\Redirector;
	use Illuminate\Support\Str;
	use Illuminate\View\View;
	use Throwable;

	class ArticleController extends Controller {
		/**
		 * Display a listing of the resource.
		 *
		 * @return View
		 */
		public function index(): View {
			$articles = Article::orderBy('updated_at')->limit(5)->get();
			return view('admin.articles', ['articles' => $articles]);
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Application|\Illuminate\Contracts\View\View|Factory
		 */
		public function create(): Application|\Illuminate\Contracts\View\View|Factory {
			return view('admin.panel', ['categories' => Category::all()]);
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param StoreArticleRequest $request
		 *
		 * @return RedirectResponse
		 * @throws Throwable
		 */
		public function store(StoreArticleRequest $request): RedirectResponse {
			$article = new Article;
			$article->title = $request->input('title');
			$article->subtitle = $request->input('subtitle');
			$article->slug = !empty($request->input('slug')) ? Str::slug($request->input('slug')) : Str::slug($request->input('title'));
			$article->body = $request->input('body');
			$article->image = 'https://image.tmdb.org/t/p/original/zKv7KF0pH9ASv2uGgTvTylMlxQn.jpg';
			if($article->saveOrFail()) {
				$the_article = Article::where('title', $request->input('title'))->first();
				$category = new ArticleCategory;
				$category->article_id = $the_article->article_id;
				$category->category_id = intval($request->input('category'));
				if($category->saveOrFail()) {
					return redirect(route('create.article'))->with('status', 'Article Saved');
				}
			}
			return redirect(route('create.article'))->with('status', 'Article Could not be saved');
		}

		/**
		 * Display the specified resource.
		 *
		 * @param Request $r
		 * @param string  $category
		 * @param int     $article
		 * @param string  $slug
		 *
		 * @return View
		 */
		public function show(Request $r, string $category, int $article, string $slug): View {
			$this_article = Article::find($article);
			$tags = $this_article->tags()->get();
			$parameters = array('category' => Category::find($category), 'article' => $this_article, 'tags' => $tags);
			return view('site.single', $parameters);
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param Article $article
		 *
		 * @return \Illuminate\Contracts\View\View|Application|Factory
		 */
		public function edit(Article $article): Application|View|Factory {
			$currentCategory = ArticleCategory::where('article_id', $article->article_id)->first();
			return view('admin.articles.edit', ['article' => $article, 'categories' => Category::all(), 'articleCategory' => $currentCategory]);
		}

		/******************************************************
		 * Update the specified resource in storage.
		 *
		 * @param UpdateArticleRequest $request
		 * @param Article              $article
		 *
		 * @return Redirector|Application|RedirectResponse
		 *****************************************************/
		public function update(UpdateArticleRequest $request, Article $article): Application|RedirectResponse|Redirector {
			$image = 'Article_' . $article->article_id . '_' . time() . '_'. $request->file('ArticleImage')->getClientOriginalName();
			$request->file('ArticleImage')->move(public_path('images'), $image);

			$newArticle = Article::find($article->article_id);
			$newArticle->title = $request->input('ArticleTittle');
			$newArticle->subtitle = $request->input('ArticleSubtitle');
			$newArticle->body = $request->input('ArticleBody');
			$newArticle->image = $image;
			if($newArticle->save()) {
				$message = 'Article Has been updated';
			}
			return redirect(route('panel.index'));
		}

		/******************************************************
		 * Remove the specified resource from storage.
		 *
		 * @param Article $article
		 *
		 * @return void
		 *****************************************************/
		public function destroy(Article $article): void {
			$article->delete();
		}
	}
