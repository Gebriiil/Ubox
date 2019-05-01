<?php

namespace Modules\FrontModule\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next) {
		if (auth('user')->check()) {

			return $next($request);
		}

		return redirect()->route('login');

	}
}
