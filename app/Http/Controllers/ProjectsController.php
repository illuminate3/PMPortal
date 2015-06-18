<?php namespace App\Http\Controllers;

use App\Project;
use App\User;
use App\Accomplishment;
use App\Action;
use App\Expense;
use App\Issue;
use App\Milestone;
use App\Risk;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Carbon\Carbon;
use Auth;
use App\Http\Controllers\PDF;
use App\Http\Requests\CreateProjectRequest;


class ProjectsController extends Controller {
	
	//CONSTRUCTOR!!!!!!!! 
	public function __construct()
	{
		$this->middleware('auth', ['except' => ['index', 'show', 'generate', 'search']]);	
		$this->middleware('manager', ['except' => ['index', 'show', 'generate', 'search']]);
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$managers = User::where('role','Project Manager')->get();		
		$projects = Project::all();

		return view('pages.index', compact('projects', 'managers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$managers = User::where('role','Project Manager')->get();
		
		return view('projects.create', compact('managers'));
	}

	public function generatepdf($id)
    {
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
		$input = Request::all();
		$id = Auth::user()->id;
		Project::create([
			'title' => $input['title'],
			'user_id' => $id,
			'status' => 'Not Yet Started',
			'color' => 'Green',
			'target_date' => $input['target_date'],
			'target_mandays' => $input['target_mandays'],
			'actual_mandays' => $input['actual_mandays'],
			'hardware' => $input['hardware'],
			'software' => $input['software']
			]);

		session()->flash('flash_confirmation', 'Your new project has been created!');

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

		$managers = User::where('role','Project Manager')->get();
		//
		$project = Project::find($id);
		$accomplishments = Accomplishment::where('project_id', $id)->get();
		$actions = Action::where('project_id', $id)->get();
		$expenses = Expense::where('project_id', $id)->get();
		$issues = Issue::where('project_id', $id)->get();
		$milestones = Milestone::where('project_id', $id)->get();
		$risks = Risk::where('project_id', $id)->get();

		return view('projects.show', compact('project', 'managers', 'actions', 'accomplishments', 'expenses', 'issues', 'milestones', 'risks'));
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
		$managers = User::where('role','Project Manager')->get();

		return view('projects.edit', compact('project','managers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateProjectRequest $request, $id)
	{
		$managers = User::where('role','Project Manager')->get();
		$project = Project::find($id);
		$input = Request::all();
			$project->update([
			'title' => $input['title'],
			'user_id' => $input['user_id'],
			'target_date' => $input['target_date'],
			'status' => $input['status'],
			'color' => $input['color'],
			'rationale' => $input['rationale'],
			'target_mandays' => $input['target_mandays'],
			'actual_mandays' => $input['actual_mandays'],
			'hardware' => $input['hardware'],
			'software' => $input['software']
			]);

		return redirect()->action('ProjectsController@show', [$id]);	return redirect('/');	
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

		if ($project->status == 'Cancelled')
		{
			$project->forceDelete();

			session()->flash('flash_confirmation', 'Project has been successfully deleted!');

			return redirect('/');
		}

		else 
		{
			session()->flash('flash_important', 'Projects can only be deleted when they are "Cancelled"');

			return redirect()->action('ProjectsController@show', [$id]);
		}
	}

	public function status($id)
	{
		$managers = User::where('role','Project Manager')->get();
		$project = Project::find($id);
		$accomplishments = Accomplishment::where('project_id', $id)->get();
		$actions = Action::where('project_id', $id)->get();
		$expenses = Expense::where('project_id', $id)->get();
		$issues = Issue::where('project_id', $id)->get();
		$milestones = Milestone::where('project_id', $id)->get();
		$risks = Risk::where('project_id', $id)->get();

		return view('projects.status', compact('project', 'managers', 'actions', 'accomplishments', 'expenses', 'issues', 'milestones', 'risks', 'function'));
	}

	public function generate($id)
	{
		$project = Project::find($id);
		$accomplishments = Accomplishment::where('project_id', $id)->get();
		$actions = Action::where('project_id', $id)->get();
		$expenses = Expense::where('project_id', $id)->get();
		$issues = Issue::where('project_id', $id)->get();
		$milestones = Milestone::where('project_id', $id)->get();
		$risks = Risk::where('project_id', $id)->get();

		return view('projects.generate', compact('project', 'actions', 'accomplishments', 'expenses', 'issues', 'milestones', 'risks'));
	}

	public function search()
	{
		$managers = User::where('role','Project Manager')->get();
		$input = Request::all();

		$q = $input['query'];
		$projects = Project::where('title', 'LIKE', "%$q%" )->get();

		//$projects = Project::whereRAW("MATCH(title) AGAINST", [$q])->get();
		return view('pages.index', compact('projects', 'managers'));
	}
}
