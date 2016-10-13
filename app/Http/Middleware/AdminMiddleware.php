<?php namespace App\Http\Middleware;

use Closure, Session;

class AdminMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$user = Session::get('rest-admin-user','nope');
		$pass = Session::get('rest-admin-pass','nope');

		if($user != 'restfad' || $pass != 'RESTadmin16!'){
			return redirect()->route('admin.login')->with('admin-error','Please login.');
		}
		return $next($request);
	}

}
