<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectsController;
use App\Project;
use App\Milestone;
use App\User;
use App\Http\Requests\CreateMilestoneRequest;
use Request;

class MilestonesController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');	
		$this->middleware('owner',['except' => ['store']]); 			
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		//
		$project = Project::find($id);
		$managers = User::where('role','Project Manager')->get();		

		return view('milestones.create', compact('project', 'managers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateMilestoneRequest $request)
	{
		$input = Request::all();
		$id = $input['project_id'];
		Milestone::create([
			'project_id' => $id,
			'milestone' => $input['milestone'],
			'status' => $input['status'],
			'target_date' => $input['target_date']
			]);
		flash()->success('Milestone has been successfully created!');
		return redirect()->action('ProjectsController@show', [$id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($project_id, $id)
	{
		//
		$milestone = Milestone::find($id);
		$managers = User::where('role','Project Manager')->get();		

		return view('milestones.edit', compact('milestone', 'managers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateMilestoneRequest $request, $project_id, $id)
	{
		//
		$milestone = Milestone::find($id);
		$input = Request::all();
		/*if ($input['status'] != "Done")
		{
			$milestone->update([
				'milestone' => $input['milestone'],
				'status' => $input['status'],
				'target_date' => $input['target_date']
			]);
		}
		else
		{
			$milestone->update([
				'milestone' => $input['milestone'],
				'status' => $input['status'],
				'target_date' => $input['target_date'],
				'actual_date' => $input['actual_date']
			]);
		}
		*/
		$milestone->update([
				'milestone' => $input['milestone'],
				'status' => $input['status'],
				'target_date' => $input['target_date'],
				'actual_date' => $input['actual_date']
			]);
		flash()->success('Milestone has been successfully updated!');
		return redirect()->action('ProjectsController@show', [$project_id]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($project_id, $id)
	{
		//
		$milestone = Milestone::find($id);
		$milestone->delete();
		flash()->success('Milestone has been successfully deleted!');
		return redirect()->action('ProjectsController@show', $project_id);
	}

}
