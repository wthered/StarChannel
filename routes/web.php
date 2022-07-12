<?php

	use App\Http\Controllers\ArticleController;
	use App\Http\Controllers\CategoryController;
	use App\Http\Controllers\HomeController;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Support\Facades\Route;

	/*
	|--------------------------------------------------------------------------
	| Web Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register web routes for your application. These
	| routes are loaded by the RouteServiceProvider within a group which
	| contains the "web" middleware group. Now create something great!
	|
	*/

//	Route::get('/', function () {
//		return view('welcome');
//	})->name('home');

	Route::get('/', [HomeController::class, 'index'])->name('home');

	Route::get('/article/{category}/{article}/{slug}', [ArticleController::class, 'show'])->name('view.article');

	Auth::routes(array('verify' => true));

//	Route::middleware(['auth', 'adminMiddleware'])->group(function () {
	Route::group(['middleware' => ['auth', 'admin']], function() {
		Route::get('/panel', [ArticleController::class, 'index'])->name('panel.index');
		Route::get('/panel/article/create', [ArticleController::class, 'create'])->name('create.article');
		Route::post('/panel/article/store', [ArticleController::class, 'store'])->name('article.store');

		Route::get('/panel/category/create', [CategoryController::class, 'create'])->name('create.category');
		Route::post('/panel/category/store', [CategoryController::class, 'store'])->name('store.category');
	});

