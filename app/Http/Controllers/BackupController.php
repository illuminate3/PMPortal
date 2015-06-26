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
		$this->middleware('auth',['except' => ['loadBackup']]);;
		$this->middleware('system_admin',['except' => ['loadBackup']]);
	}

	public function backup()
	{
		//Event::fire('audit.user.backup',Auth::user());
		$exitCode = Artisan::call('backup:clean');
		$exitCode = Artisan::call('backup:run',  ['--only-db'=>null]);
		flash()->success('Database has been successfully backed up under /storage/app/backups!'); //go to PMPortal/storage/app/backups
		return redirect()->action('ProjectsController@index');
	}

	public function loadBackup()
	{
		\DB::Connection('mysql2')->statement('CREATE DATABASE IF NOT EXISTS pmportal');
		\DB::unprepared(file_get_contents('C:\xampp\htdocs\PMPortal\storage\app\backups\dump.sql'));
		flash()->success('Database backup has been successfully loaded');
		return redirect()->action('ProjectsController@index');
	}

}
