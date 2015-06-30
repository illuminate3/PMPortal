<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Project;

class ViewComposerServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		/**
		 * sidebar pm filter (it shows the pm even though the pm is deleted)
	 	 */
		view()->composer('includes.sidebar_home', function($view)
		{
			$allprojects = Project::all();
			$fmanagers = [];
			foreach ($allprojects as $project) {
				if (!in_array($project['pm'], $fmanagers))
				$fmanagers[] = $project['pm'];
				}
			$view->with('fmanagers', $fmanagers);
		});

		view()->composer('includes.sidebar_show', function($view)
		{

			$allprojects = Project::all();
			$fmanagers = [];
			foreach ($allprojects as $project) {
				if (!in_array($project['pm'], $fmanagers))
				$fmanagers[] = $project['pm'];
				}
			$view->with('fmanagers', $fmanagers);
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
