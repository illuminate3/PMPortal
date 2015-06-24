<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectsController;
use App\Project;
use App\User;
use App\Milestone;
use App\Issue;
use App\Risk;
use App\Expense;
use App\Accomplishment;
use App\Action;
use Request;
use Spatie\Activitylog\Models\Activity;
use Auth;
use DB;

class AuditController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');	
		$this->middleware('system_admin'); 
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function changeLog()
	{
		$activities = Activity::whereIn('action',array('Created','Deleted','Updated'))->get();
								//->where(user('name'),'!=','name')->get(); 
		$projects = Project::all();
		$milestones = Milestone::all();
		$accomplishments = Accomplishment::all();
		$issues = Issue::all();
		$risks = Risk::all();
		$users = User::all();
		$expenses = Expense::all();
		$actions = Action::all();
		return view('audit.change_log', compact('activities','projects','milestones','accomplishments','issues','risks','users','expenses','actions'));
	}

	public function deleteOldestFiftyChanges()
	{
		$revisions = DB::table('revisions')->orderBy('created_at','asc')->take(50)->get();
		foreach ($revisions as $revision)
			DB::table('revisions')->where('id', '=', $revision->id)->delete();
		session()->flash('flash_confirmation', 'Oldest fifty records have been successfully deleted!'); //go to PMPortal/storage/app/backups
		return redirect()->action('AuditController@changeLog');
	}

	public function deleteOldestFiftyActivities()
	{
		$activities = DB::table('activity_log')->orderBy('created_at','asc')->take(50)->get();
		foreach ($activities as $activity)
			DB::table('activity_log')->where('id', '=', $activity->id)->delete();
		session()->flash('flash_confirmation', 'Oldest fifty records have been successfully deleted!'); //go to PMPortal/storage/app/backups
		return redirect()->action('AuditController@changeLog');
	}




}
