<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectsController;
use App\Project;
use App\User;
use Request;
use App\Chart;
use App\BusinessProjectTeamMember;

class BusinessProjectTeamMembersController extends Controller {

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
		return view('business_project_team_members.create', compact('project'));
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
		BusinessProjectTeamMember::create([
			'project_id' => $input['project_id'],
			'name' => $input['name'],
			'role' => $input['role'],
			]);

		flash()->success('Business Project Team Member has been successfully created');
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
		
		$business_project_team_member = BusinessProjectTeamMember::where('project_id', $id)->first();
		$project = Project::find($id);

		return view('business_project_team_members.show', compact('business_project_team_member', 'project'));
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
		$business_project_team_member = BusinessProjectTeamMember::where('project_id', $id)->first();
		$project = Project::find($id);


		return view('business_project_team_members.edit', compact('business_project_team_member', 'project'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$business_project_team_member = BusinessProjectTeamMember::where('project_id', $id)->first();
		$input = Request::all();
		$business_project_team_member->update([
			'name' => $input['name'],
			'role' => $input['role']
			]);

		flash()->success('Business Project Team Member has been successfully updated');
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
		$business_project_team_member = BusinessProjectTeamMember::where('project_id', $id)->first();
		$business_project_team_member->delete();

		flash()->success('Business Project Team Member has been successfully deleted');
		return redirect()->action('ChartsController@show', [$id]);
	}

}
