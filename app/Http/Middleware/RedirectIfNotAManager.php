<?php namespace App\Http\Middleware;

use Closure;

class RedirectIfNotAManager {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ( $request->user()->isAProjectManager())
		{			
			return $next($request);
		}

		session()->flash('flash_important', 'You must be logged on as a Project Manager in order to proceed.');

		return redirect('/');	
	}

}
