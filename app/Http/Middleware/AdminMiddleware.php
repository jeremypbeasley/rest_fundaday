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

		$admin_user = env('ADMIN_USER');
		$admin_pass = env('ADMIN_PASS');

		if($user != $admin_user || $pass != $admin_pass){
			return redirect()->route('admin.login')->with('admin-error','Please login.');
		}
		return $next($request);
	}

}
