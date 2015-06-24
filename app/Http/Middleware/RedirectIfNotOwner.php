<?php namespace App\Http\Middleware;

use Closure;
use App\Project;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class RedirectIfNotOwner {

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
        if ($project['user_id'] != Auth::user()['id']) {
            flash()->error('You can only edit your own project');
            return redirect('/');
        }
        return $next($request);
    }

}
