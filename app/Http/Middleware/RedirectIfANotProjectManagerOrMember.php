<?php namespace App\Http\Middleware;

use Closure;
use App\Project;
use Illuminate\Contracts\Auth\Guard;
use Auth;

class RedirectIfANotProjectManagerOrMember {

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


        if ($project['confidentiality'] == 'Public')
        {
            return $next($request);
        }
        else
        {
            if (Auth::guest())
            {
                flash()->error('You are not authorized to view this project.');
                return redirect()->action('ProjectsController@index');
            }
            else
            {
                if (($request->user()->isASystemAdministrator()) || ($project['user_id'] == Auth::user()['id']) )
                {
                    return $next($request);
                }
                else
                {
                    if ($project['user_id'] != null)
                    {
                        if ($project['user_id'] == Auth::user()['id'])
                        {
                            return $next($request);
                        }
                        else
                        {
                            if ($project->getUserListAttributes() == null)
                            {
                                flash()->error('You are not authorized to view this project.');
                                return redirect()->action('ProjectsController@index');
                            }
                            else
                            {
                                if (in_array(Auth::user()['id'],$project->getUserListAttributes()))
                                {
                                    return $next($request);
                                }
                            }
                        }
                    }
                    else
                    {
                        if ($project->getUserListAttributes() == null)
                        {
                            flash()->error('You are not authorized to view this project.');
                            return redirect()->action('ProjectsController@index');
                        }
                        else
                        {
                            if (in_array(Auth::user()['id'],$project->getUserListAttributes()))
                            {
                                return $next($request);
                            }
                        }
                    }
                }
            }
            flash()->error('You are not authorized to view this project.');
            return redirect()->action('ProjectsController@index');
        }
       
    }

}
