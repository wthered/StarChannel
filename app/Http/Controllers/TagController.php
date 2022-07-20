<?php

	namespace App\Http\Controllers;

	use App\Http\Requests\CreateTagRequest;
	use App\Models\Article;
	use App\Models\ArticleTag;
	use App\Models\Tag;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Contracts\View\View;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Routing\Redirector;

	class TagController extends Controller {

//		Show the form for creating a new resource.
		public function create(): Factory|View|Application {
			$tags = Tag::orderBy('tag_name')->get();
			return view('admin.tags.create', ['tags' => $tags]);
		}

		public function store(CreateTagRequest $r) : RedirectResponse|Application|Redirector {
			$tagItem = new Tag;
			$tagItem->tag_name = $r->input('tag');
			if($tagItem->save()) {
				return redirect(route('create.tag'))->with('message', 'Tag created successfully');
			}
			return redirect(route('create.tag'))->with('message', 'Tag could not be created');
		}

		public function assign(Request $r, Article $article): Factory|View|Application {
			$enabled = ArticleTag::where('article_id', $article->article_id)->get();
			$available = Tag::orderBy('tag_name')->get();
			return view('admin.tags.assign', ['tags' => $available, 'enabled' => $enabled, 'article' => $article]);
		}

		public function commit(Request $r, Article $article) : RedirectResponse|Application|Redirector {
//			dd($r->input());
			$tags = $r->input('tags');
			ArticleTag::where('article_id', $article->article_id)->delete();
			foreach ($tags as $tag) {
				$tagModel = new ArticleTag;
				$tagModel->article_id = $article->article_id;
				$tagModel->tag_id = $tag;
				$tagModel->saveOrFail();
			}
			return redirect(route('assign.tag', array('article' => $article->article_id)))->with('message', 'Tags Successfully Assigned');
		}
	}
