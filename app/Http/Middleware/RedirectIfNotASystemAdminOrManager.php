<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfNotASystemAdminOrManager {

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
			session()->flash('flash_important', 'You must be logged on as a System Administrator or Project Manager in order to proceed.');

		return redirect('/');	
		}
		elseif ( $request->user()->isASystemAdministratorOrProjectManager())
		{			
			return $next($request);
		}
		
		session()->flash('flash_important', 'You must be logged on as a System Administrator or Project Manager in order to proceed.');
		return redirect('/');	
	}

}
