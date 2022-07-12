<?php

	namespace App\Http\Middleware;

	use Closure;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Contracts\View\View;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\Routing\Redirector;
	use Illuminate\Support\Facades\Auth;

	class adminMiddleware {
		/**
		 * Handle an incoming request.
		 *
		 * @param Request $request
		 * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
		 *
		 * @return RedirectResponse|Response|JsonResponse
		 */
		public function handle(Request $request, Closure $next): RedirectResponse|Response|JsonResponse {
//			return $next($request);
			if (Auth::check()) {
				if (!empty(Auth::user()->admin)) {
					// Returns Response
					return $next($request);
				}
			}
			return redirect(route('login'));
		}
	}
