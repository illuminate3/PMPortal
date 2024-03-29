<?php namespace App\Http\Controllers;

use App\Project;
use App\User;
use App\Accomplishment;
use App\Action;
use App\Expense;
use App\Issue;
use App\Milestone;
use App\Risk;
use App\Deliverable;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Carbon\Carbon;
use Auth;
use App\Http\Controllers\PDF;
use App\Http\Requests\CreateProjectRequest;
use App\Http\Controllers\FiltersController;
use App\Http\Controllers\DeliverablesController;
use DB;
use App\Http\Controllers\ChartsController;
use App\Chart;
use Input;
use Validator;

use Session;




class ProjectsController extends Controller {

	//CONSTRUCTOR!!!!!!!! 
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show', 'search','myProjects','generate','generatepdf']]);
		$this->middleware('manager', ['except' => ['index', 'show', 'search','myProjects','generate','generatepdf']]);
		$this->middleware('owner', ['only' => ['edit','update','destroy']]);
		$this->middleware('manager_or_member', ['except' => ['index','search','create','store','myProjects']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		/* Retrieving data from database and assigning to variables. */
		$managers = User::where('role','Project Manager')->get();	
		$viewers = User::where('role', 'User')->get();

		$redProj = Project::where('color', 'Red')->get();
		$amberProj = Project::where('color', 'Amber')->get();
		$greenProj = Project::where('color', 'Green')->get();
		$blueProj = Project::where('color', 'Blue')->get();	

		if (Auth::guest())
			$projects = Project::where('confidentiality','Public')->get();
		else
			$projects = Project::all();
		
		
		/* Declaring variables. */
		$manCount = 0;	
		$viewCount = 0;	
		$redCount = 0;
		$amberCount = 0;
		$greenCount = 0;
		$blueCount = 0;


		foreach ($managers as $manager)
		{
			$manCount =  $manCount + 1;
		}

		foreach ($viewers as $viewer)
		{
			$viewCount = $viewCount + 1;
		}

		foreach ($redProj as $red)
		{
			$redCount = $redCount + 1;
		}

		foreach ($amberProj as $amber)
		{
			$amberCount = $amberCount + 1;
		}

		foreach ($greenProj as $green)
		{
			$greenCount = $greenCount + 1;
		}

		foreach ($blueProj as $blue)
		{
			$blueCount = $blueCount + 1;
		}

		/* Redirect to view page and pass variables. */
		return view('pages.index', compact('projects','manCount', 'viewCount', 'blueCount', 'redCount', 'greenCount', 'amberCount'));

		//return view('pages.index', compact('projects'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{	
		$users = User::where('role','!=','System Administrator')->where('id','!=',Auth::user()->id)->get();//('role','Project Manager')->where('id','!=',Auth::user()->id)->get();
		$users = array_values(array_sort($users, function($value)
		{
    		return $value['name'];
		}));
		return view('projects.create', compact('users'));
	}

	public function generatepdf($id)
    {
    	ini_set("max_execution_time", 0);
    	$pdf = \PDF::loadHTML($this->generate($id));
    	return $pdf->stream();
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateProjectRequest $request)
	{
		//dd($request->input('users'));

		$input = Request::all();

		if ($input['target_mandays'] >= 60 or $input['budget'] >= 2000000)
		{
			$importance = "MAJOR";
		}
		else
		{
			$importance = "MINOR";
		}


		$id = Auth::user()->id;
		$pm = Auth::user()->name;
		Project::create([
			'cac' => $input['cac'],
			'title' => $input['title'],
			'user_id' => $id,
			'pm' => $pm,
			'status' => 'Not Yet Started',
			'color' => 'Green',
			'percent' => 0,
			'target_start' => $input['target_start'],
			'target_end' => $input['target_end'],
			'actual_start' => '0000-00-00',
			'actual_end' => '0000-00-00',
			'budget' => $input['budget'],
			'target_mandays' => $input['target_mandays'],
			'actual_mandays' => '0',
			'hardware' => $input['hardware'],
			'software' => $input['software'],
			'importance' => $importance,
			'applicability' => $input['applicability'],
			'confidentiality' => $input['confidentiality']
			]);

		$project = Project::all()->last();
		$project->users()->attach($request->input('users'));

		Chart::create([
			'project_id' => $project['id'],
			'project_manager' => $project['pm']
			]);

		/* Upon creation of new project, checklist of deliverables are also created */
		$deliverables = [];
		$deliverables = ['Project Approval', 'Product Sign-off', 'Conceptual Solution Architecture Document', 
						'Risk and Issue Log', 'Project Definition Report', 'Project Repository', 'Project Kick-off Package', 
						'Proejct Organization Structure', 'Roles and Responsibilities', 'Project Timeline', 
						'Minutes of Project Kick-off Meeting', 'QM Classification Matrix', 

						'User Requirement Matrix', 'Business Process Re-engineering Document', 
						'Functional Specifications Document', 'Functional Specifications Sign-off', 'Conversion Plan', 
						'Solution Architecture Document (Logical)',	'Solution Architecture Document (Physical)', 
						'Technical Specifications Document', 'Technical Specifications Sign-off', 
						'Logical Technology Model', 'Physical Technology Model',

						'Vendor System Delivery Sign-off', 'SCA Report', 

						'High Level SIT Plan', 'SIT Test Scripts and Cases', 'SIT Test Results', 'SIT Sign-off', 
						'SIT Test Probem Plan', 'High Level UAT Plan', 'Penetration Test', 'Performance Test', 
						'UAT Test Scripts and Results', 'UAT Test Results', 'UAT Sign-off', 'UAT Test Problem Form', 
						'Functional Specifications Document (Addendum)', 'Functional Specifications Change Request Form', 

						'Implementation Plan', 'System Documentation', 'High Level Live Test Plan', 'Training Plan', 
						'Training Materials', 'Preliminary Assessment for Load Test', 'Risk Management Sign-off',
						'Data Governance Sign-off', 'IT Security Sign-off', 'Compliance Sign-off', 'Audit Sign-off', 
						'Minutes of Meeting (Pre-CRM)', 'Minutes of Meeting (CRM/PIM)', 'Data Validation Sign-off', 
						'Live Test Sign-off', 
						
						'Fact Gathering Feedback', 'Survey Questionnaire', 'PIA Report', 'Minutes of Meeting (PIAM/PMM)',
						
						'Regulatory Clearance/Sign-off/Approval/Notification', 'Project Risk Assessment'];

		$i = 0;
		$required = [];
		if ($input['applicability'] == 'New or Replacement of IT Solution')
		{
			$required = ['M', 'O', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 
						'M', 'O', 'M', 'M', 'O', 'M', 'M', 'M', 'M', 'O', 'O',
						'O', 'N/A',
						'M', 'M', 'M', 'M', 'O', 'M', 'O', 'O', 'M', 'M', 'M', 'O', 'O', 'O',
						'M','M','O','O','O','M','M','M','M','M','M','M','M','O','O',
						'M','M','M','M',
						'O','O'];
		}
		elseif ($input['applicability'] == 'Enhancement or Application System Upgrade')
		{
			$required = ['M', 'O', '-', '-', '-', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 
						'-', 'O', 'M', 'M', 'O', '-', '-', 'M', 'M', 'O', 'O',
						'O', 'N/A',
						'M', 'M', 'M', 'M', 'O', 'M', 'O', 'O', 'M', 'M', 'M', 'O', 'O', 'O',
						'M','M','O','O','O','M','M','M','M','M','M','M','M','O','O',
						'O','O','O','M',
						'O','O'];
		}
		elseif ($input['applicability'] == 'IT Infrastructure')
		{
			$required = ['M', '-', '-', '-', '-', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 
						'-', '-', '-', '-', '-', '-', 'M', 'M', 'M', 'O', 'O',
						'O', 'N/A',
						'M', 'M', 'M', 'M', 'O', 'M', 'O', 'O', 'M', 'M', 'M', 'O', '-', '-',
						'M','M','O','O','O','M','-','-','M','-','M','M','M','-','O',
						'O','O','O','M',
						'O','O'];
		}

		foreach($deliverables as $deliverable)
		{
			Deliverable::create([
				'project_id' => $project['id'],
				'deliverable' => $deliverable,
				'required' => $required[$i]
				]);
			$i = $i + 1;
		}
		flash()->success('Your new project has been created!');
		
		return redirect('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$project = Project::find($id);
		$accomplishments = Accomplishment::where('project_id', $id)->get();
		$actions = Action::where('project_id', $id)->get();
		$expenses = Expense::where('project_id', $id)->get();
		$issues = Issue::where('project_id', $id)->get();
		$milestones = Milestone::where('project_id', $id)->get();
		$risks = Risk::where('project_id', $id)->get();
		$lastUser = $project->users->last();
		return view('projects.show', compact('project', 'actions', 'accomplishments', 'expenses', 'issues', 'milestones', 'risks','lastUser'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{	
		$project = Project::find($id);

		$projectusers = array_pluck($project -> users, 'name');

		if($project['user_id'] == null)
		{
			$users = User::where('role','!=','System Administrator')->where('id','!=',Auth::user()->id)->get();
		}
		else
		{
			$users = User::where('role','!=','System Administrator')->where('id','!=',Auth::user()->id)->where('id','!=',$project['user_id'])->get();//('role','Project Manager')->where('id','!=',Auth::user()->id)->get();
		}

		$managers = User::where('role','Project Manager')->get();
		
		return view('projects.edit', compact('project','managers','users','projectusers'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$project = Project::findOrFail($id);
		$validator = Validator::make(Input::all(),
			array(
				'cac' => 'required|cac|unique:projects,cac,'.$id,
				'title' => 'required',		
				'target_start' => 'required',
				'target_end' => 'required',
				'target_mandays' => 'required',
				'budget' => 'required',
				'confidentiality' => 'required'	
				)
			);
		if($validator->fails())
		{
	   		return redirect()->action('ProjectsController@edit',$project->id)->withErrors($validator);
		}
		else
		{

			$users = User::all();
			//$input = Request::all();
			$input = Input::all();
			foreach($users as $user){
				if ($user->id == $input['pm'])
				{
					$pmid = $user->id;
					$pmname = User::find($pmid);
				}
			}

			if ($input['target_mandays'] >= 60 or $input['budget'] >= 2000000)
			{
				$importance = "MAJOR";
			}

			else
			{
				$importance = "MINOR";
			}
				$project->update([
				'cac' => $input['cac'],
				'title' => $input['title'],
				'user_id' => $pmid,
				'pm' => $pmname->name,

				'percent' => $input['percent'],
				'target_start' => $input['target_start'],
				'target_end' => $input['target_end'],

				'status' => $input['status'],
				'color' => $input['color'],
				'rationale' => $input['rationale'],

				'actual_start' => $input['actual_start'],
				'actual_end' => $input['actual_end'],
				'budget' => $input['budget'],
				'utilization' => $input['utilization'],
				'target_mandays' => $input['target_mandays'],
				'actual_mandays' => $input['actual_mandays'],
				'hardware' => $input['hardware'],
				'software' => $input['software'],

				'importance' => $importance,
				'applicability' => $input['applicability'],
				'confidentiality' => $input['confidentiality']
				
				]);

			if ($input['status'] != 'Not Started')
				$project->update([
					'actual_start' => $input['actual_start']
					]);
			

			if ($input['status'] == 'Completed' or $input['status'] == 'Cancelled')
				$project->update([
					'actual_end' => $input['actual_end']
					]);	
			
			//$input = Request::all();
			//$request = new CreateProjectRequest;
			if(isset($input['users']) == true)
			{
				$project->users()->sync($input['users']);
			}
			else
			{
				DB::delete('delete from project_user where project_id = ?', array($project->id));
			}
			

			$deliverables = Deliverable::where('project_id', $id)->get();
			$i = 0;

			$required = [];
			if ($input['applicability'] == 'New or Replacement of IT Solution')
			{
				$required = ['M', 'O', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 
							'M', 'O', 'M', 'M', 'O', 'M', 'M', 'M', 'M', 'O', 'O',
							'O', 'N/A',
							'M', 'M', 'M', 'M', 'O', 'M', 'O', 'O', 'M', 'M', 'M', 'O', 'O', 'O',
							'M','M','O','O','O','M','M','M','M','M','M','M','M','O','O',
							'M','M','M','M',
							'O','O'];
			}
			elseif ($input['applicability'] == 'Enhancement or Application System Upgrade')
			{
				$required = ['M', 'O', '-', '-', '-', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 
							'-', 'O', 'M', 'M', 'O', '-', '-', 'M', 'M', 'O', 'O',
							'O', 'N/A',
							'M', 'M', 'M', 'M', 'O', 'M', 'O', 'O', 'M', 'M', 'M', 'O', 'O', 'O',
							'M','M','O','O','O','M','M','M','M','M','M','M','M','O','O',
							'O','O','O','M',
							'O','O'];
			}
			elseif ($input['applicability'] == 'IT Infrastructure')
			{
				$required = ['M', '-', '-', '-', '-', 'M', 'M', 'M', 'M', 'M', 'M', 'M', 
							'-', '-', '-', '-', '-', '-', 'M', 'M', 'M', 'O', 'O',
							'O', 'N/A',
							'M', 'M', 'M', 'M', 'O', 'M', 'O', 'O', 'M', 'M', 'M', 'O', '-', '-',
							'M','M','O','O','O','M','-','-','M','-','M','M','M','-','O',
							'O','O','O','M',
							'O','O'];
			}

			foreach($deliverables as $deliverable)
			{
				$deliverable->update([
					'required' => $required[$i]
					]);
				$i = $i + 1;
			}

			flash()->success('Your project has been successfully updated!');
			return redirect()->action('ProjectsController@show', [$id]);

		}
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */


	public function destroy($id)
	{
		$project = Project::find($id);
		$status = $project->status;

		if ($project->status == 'Cancelled')
		{

	    	$project->forceDelete();
	    	flash()->success('Project deleted successfully!');
	    	return redirect('/');
		}
		else 
		{
			flash()->error('Projects can only be deleted when they are "Cancelled"');
			return redirect()->action('ProjectsController@show', [$id]);
    	}
	}

	public function status($id)
	{
		//$managers = User::where('role','Project Manager')->get();
		
		$project = Project::find($id);
		$accomplishments = Accomplishment::where('project_id', $id)->get();
		$actions = Action::where('project_id', $id)->get();
		$expenses = Expense::where('project_id', $id)->get();
		$issues = Issue::where('project_id', $id)->get();
		$milestones = Milestone::where('project_id', $id)->get();
		$risks = Risk::where('project_id', $id)->get();
		
		return view('projects.status', compact('project', 'actions', 'accomplishments', 'expenses', 'issues', 'milestones', 'risks', 'function'));
	}

	public function generate($id)
	{
		ini_set("max_execution_time", 0);
		$project = Project::find($id);
		$accomplishments = Accomplishment::where('project_id', $id)->get();
		$actions = Action::where('project_id', $id)->get();
		$expenses = Expense::where('project_id', $id)->get();
		$issues = Issue::where('project_id', $id)->get();
		$milestones = Milestone::where('project_id', $id)->get();
		$risks = Risk::where('project_id', $id)->get();
		$lastUser = $project->users->last();
		return view('projects.generate', compact('project', 'actions', 'accomplishments', 'expenses', 'issues', 'milestones', 'risks','lastUser'));
	}

	public function search()
	{
		//$managers = User::where('role','Project Manager')->get();
		
		$input = Request::all();
		$q = $input['query'];
		
		if (Auth::guest())
			$projects = Project::where('confidentiality','Public')->where('title', 'LIKE', "%$q%" )->orWhere('cac', 'LIKE', "%$q%" )->get();
		else
			$projects = Project::where('title', 'LIKE', "%$q%" )->orWhere('cac', 'LIKE', "%$q%" )->get();
				

		if ($projects == "[]")
		{
			flash()->error('There are no projects that match your query!');
			return redirect()->action('ProjectsController@index', compact('projects','managers'));		
		}
				
		return view('pages.index', compact('projects', 'managers'));
	}

	public function myProjects()
	{
		$projects = Project::all();

		return view('pages.my_projects', compact('projects'));
	}
}
