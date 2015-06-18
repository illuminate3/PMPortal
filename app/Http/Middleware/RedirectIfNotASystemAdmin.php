<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfNotASystemAdmin {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Auth::guest())
		{
			session()->flash('flash_important', 'You must be logged on as a System Administrator in order to proceed.');

		return redirect('/');	
		}
		elseif ( $request->user()->isASystemAdministrator())
		{			
			return $next($request);
		}
		
		session()->flash('flash_important', 'You must be logged on as a System Administrator in order to proceed.');
		return redirect('/');	
	}

}
