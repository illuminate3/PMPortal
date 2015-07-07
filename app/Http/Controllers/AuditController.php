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
use App\Deliverable;
use App\BusinessProjectTeamMember;
use App\SupportTeamMember;
use App\TechnicalProjectTeamMember;
use App\ProjectUser;
use Request;
use Spatie\Activitylog\Models\Activity;
use Auth;
use DB;

class AuditController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');	
		$this->middleware('system_admin',['except' =>['changeLog']]);

	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function changeLog()
	{
		
		if (Auth::user()->role = "Project Manager")
		{
		$activities = Activity::whereIn('action',array('Created','Deleted','Updated'))
							->where(function($query){
								return $query->where('action','!=','Created')->orWhere('type','!=','Deliverable');
							})
							->where('user_id',Auth::user()->id)
							->get();

		$projects = Project::where('user_id',Auth::user()->id)->get();
		$projectids = array_pluck($projects, 'id');

		$milestones = Milestone::whereIn('project_id',$projectids)->get();
		
		$accomplishments = Accomplishment::whereIn('project_id',$projectids)->get();
		$issues = Issue::whereIn('project_id',$projectids)->get();
		$risks = Risk::whereIn('project_id',$projectids)->get();
		
		$expenses = Expense::whereIn('project_id',$projectids)->get();
		$actions = Action::whereIn('project_id',$projectids)->get();
		$deliverables = Deliverable::whereIn('project_id',$projectids)->get();
		$business_project_team_members = BusinessProjectTeamMember::whereIn('project_id',$projectids)->get();
		$technical_project_team_members = TechnicalProjectTeamMember::whereIn('project_id',$projectids)->get();
		$support_team_members = SupportTeamMember::whereIn('project_id',$projectids)->get();
		
		return view('audit.change_log', compact('activities','projects','milestones','accomplishments','issues','risks','expenses','actions', 'deliverables','business_project_team_members','technical_project_team_members','support_team_members'));
	
		}
		elseif(Auth::user()->role = "System Administrator"){
		$activities = Activity::whereIn('action',array('Created','Deleted','Updated'))
							->where(function($query){
								return $query->where('action','!=','Created')->orWhere('type','!=','Deliverable');
							})
							->get();
		$projects = Project::all();
		$milestones = Milestone::all();
		$accomplishments = Accomplishment::all();
		$issues = Issue::all();
		$risks = Risk::all();
		$users = User::all();
		$expenses = Expense::all();
		$actions = Action::all();
		$deliverables = Deliverable::all();
		$business_project_team_members = BusinessProjectTeamMember::all();
		$technical_project_team_members = TechnicalProjectTeamMember::all();
		$support_team_members = SupportTeamMember::all();
		return view('audit.change_log', compact('activities','projects','milestones','accomplishments','issues','risks','users','expenses','actions', 'deliverables','business_project_team_members','technical_project_team_members','support_team_members'));
		}
		else{
			flash()->error('You are not authorized to proceed.');
		}
	}

	public function deleteOldestFiftyChanges()
	{
		$revisions = DB::table('revisions')->orderBy('created_at','asc')->take(50)->get();
		foreach ($revisions as $revision)
			DB::table('revisions')->where('id', '=', $revision->id)->delete();
		flash()->success('Oldest fifty records have been successfully deleted!'); //go to PMPortal/storage/app/backups
		return redirect()->action('AuditController@changeLog');
	}

	public function deleteOldestFiftyActivities()
	{
		$activities = DB::table('activity_log')->orderBy('created_at','asc')->take(50)->get();
		foreach ($activities as $activity)
			DB::table('activity_log')->where('id', '=', $activity->id)->delete();
		flash()->success('Oldest fifty records have been successfully deleted!'); //go to PMPortal/storage/app/backups
		return redirect()->action('AuditController@changeLog');
	}

	public function generate()
	{
		$activities = Activity::whereIn('action',array('Created','Deleted','Updated'))
								->where(function($query){
									return $query->where('action','!=','Created')->orWhere('type','!=','Deliverable');
								})
								->get();
		$projects = Project::all();
		$milestones = Milestone::all();
		$accomplishments = Accomplishment::all();
		$issues = Issue::all();
		$risks = Risk::all();
		$users = User::all();
		$expenses = Expense::all();
		$actions = Action::all();
		$deliverables = Deliverable::all();
		$business_project_team_members = BusinessProjectTeamMember::all();
		$technical_project_team_members = TechnicalProjectTeamMember::all();
		$support_team_members = SupportTeamMember::All();
		return view('audit.generate', compact('activities','projects','milestones','accomplishments','issues','risks','users','expenses','actions', 'deliverables','business_project_team_members','technical_project_team_members','support_team_members'));
	}
	
	public function generatePdf()
    {
    	$pdf = \PDF::loadHTML($this->generate());
    	return $pdf->stream();
    }

}
