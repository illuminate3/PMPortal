<?php namespace App\Http\Middleware;

use Closure;
use App\Project;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class RedirectIfNotASystemAdminOrOwner {

	/**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->segments()[1];
        $project = Project::find($id);


        if (($project['user_id'] != Auth::user()['id']) && ($request->user()->isASystemAdministrator() == false))
        {
            flash()->error('You are not authorized to edit or delete this project.');
            return redirect()->action('ProjectsController@index');
        }
        return $next($request);
    }

}
