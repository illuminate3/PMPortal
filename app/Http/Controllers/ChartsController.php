<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectsController;
use App\Project;
use App\User;
use Request;
use App\Chart;
use App\SupportTeamMember;
use App\BusinessProjectTeamMember;
use App\TechnicalProjectTeamMember;

class ChartsController extends Controller {

	public function __construct()
	{
		$this->middleware('owner', ['only' => ['edit','update','destroy']]);
		$this->middleware('auth', ['except' => ['show']]);	
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

		return view('charts.create', compact('project'));
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
		Chart::create([
			'project_id' => $input['project_id'],
			'project_sponsor' => $input['project_sponsor'],
			'product_owner' => $input['product_owner'],
			'project_director' => $input['project_director'],
			'project_manager' => $input['project_manager'],
			'audit' => $input['audit'],
			'group_compliance' => $input['group_compliance'],
			'business_project_manager' => $input['business_project_manager'],
			'business_analyst' => $input['business_analyst'],
			'quality_management' => $input['quality_management'],
			'it_security' => $input['it_security'],
			'enterprise_architecture' => $input['enterprise_architecture'],
			'strategic_procurement' => $input['strategic_procurement'],
			'technical_project_manager' => $input['technical_project_manager']
			]);

		flash()->success('Chart has been successfully created');
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
		
		$chart = Chart::where('project_id', $id)->first();
		$project = Project::find($id);
		$support_team_members = SupportTeamMember::where('project_id', $id)->get();
		$technical_project_team_members = TechnicalProjectTeamMember::where('project_id', $id)->get();
		$business_project_team_members = BusinessProjectTeamMember::where('project_id', $id)->get();

		return view('charts.show', compact('chart', 'project','support_team_members','technical_project_team_members','business_project_team_members'));
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
		$chart = Chart::where('project_id', $id)->first();
		$project = Project::find($id);

		return view('charts.edit', compact('chart', 'project'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$chart = Chart::where('project_id', $id)->first();
		$input = Request::all();
		$chart->update([
			'project_sponsor' => $input['project_sponsor'],
			'product_owner' => $input['product_owner'],
			'project_director' => $input['project_director'],
			'project_manager' => $input['project_manager'],
			'audit' => $input['audit'],
			'group_compliance' => $input['group_compliance'],
			'business_project_manager' => $input['business_project_manager'],
			'business_analyst' => $input['business_analyst'],
			'quality_management' => $input['quality_management'],
			'it_security' => $input['it_security'],
			'enterprise_architecture' => $input['enterprise_architecture'],
			'strategic_procurement' => $input['strategic_procurement'],
			'technical_project_manager' => $input['technical_project_manager']
			]);

		flash()->success('Chart has been successfully updated!');
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
		$chart = Chart::find($id);
		$id = $chart['project_id'];
		$chart->delete();

		return redirect()->action('ProjectsController@show', $id);
	}

}
