<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectsController;
use App\Project;
use App\User;
use Request;
use App\Chart;
use App\TechnicalProjectTeamMember;

class TechnicalProjectTeamMembersController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');	
		$this->middleware('owner',['except' => ['store','show']]); 	
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
		return view('technical_project_team_members.create', compact('project'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = Request::all();
		$id = $input['project_id'];
		TechnicalProjectTeamMember::create([
			'project_id' => $input['project_id'],
			'name' => $input['name'],
			'role' => $input['role'],
			]);

		flash()->success('Technical Project Team Member has been successfully created');
		return redirect()->action('ChartsController@show', [$id]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$technical_project_team_member = TechnicalProjectTeamMember::where('project_id', $id)->first();
		$project = Project::find($id);

		return view('technical_project_team_members.show', compact('technical_project_team_member', 'project'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$technical_project_team_member = TechnicalProjectTeamMember::where('project_id', $id)->first();
		$project = Project::find($id);


		return view('technical_project_team_members.edit', compact('technical_project_team_member', 'project'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$technical_project_team_member = TechnicalProjectTeamMember::where('project_id', $id)->first();
		$input = Request::all();
		$technical_project_team_member->update([
			'name' => $input['name'],
			'role' => $input['role']
			]);

		flash()->success('Technical Project Team Member has been successfully updated');
		return redirect()->action('ChartsController@show', [$id]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		//$chart = Chart::find($id);
		//$id = $accomplishment['project_id'];
		$technical_project_team_member = TechnicalProjectTeamMember::where('project_id', $id)->first();
		$technical_project_team_member->delete();

		flash()->success('Technical Project Team Member has been successfully deleted');
		return redirect()->action('ChartsController@show', [$id]);
	}

}
