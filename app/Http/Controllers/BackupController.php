<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use App\Http\Requests;
use Request;
use App\Project;
use Closure;
use Artisan;
use Config;
use Event;

class BackupController extends Controller {


	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->middleware('auth');
		$this->middleware('system_admin');
	}

	public function backup()
	{
		//Event::fire('audit.user.backup',Auth::user());
		$exitCode = Artisan::call('backup:run',  ['--only-db'=>null]);
		session()->flash('flash_confirmation', 'Database has been successfully backed up!'); //go to PMPortal/storage/app/backups
		return redirect()->action('ProjectsController@index');
	}

	

}
