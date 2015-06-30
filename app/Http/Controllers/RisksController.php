<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectsController;
use App\Project;
use App\Risk;
use App\User;
use App\Http\Requests\CreateRiskRequest;
use Request;

class RisksController extends Controller {

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

		return view('risks.create', compact('project', 'managers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateRiskRequest $request)
	{
		//
		$input = Request::all();
		$id = $input['project_id'];
		Risk::create([
			'project_id' => $input['project_id'],
			'risk' => $input['risk'],
			'impact' => $input['impact'],
			'probability' => $input['probability'],
			'mitigation' => $input['mitigation']
			]);
		flash()->success('Risk has been successfully created!');
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
		$risk = Risk::find($id);
		$managers = User::where('role','Project Manager')->get();

		return view('risks.edit', compact('risk', 'managers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateRiskRequest $request, $project_id, $id)
	{
		$risk = Risk::find($id);
		$input = Request::all();
		$risk->update([
			'risk' => $input['risk'],
			'impact' => $input['impact'],
			'probability' => $input['probability'],
			'mitigation' => $input['mitigation']
			]);
		flash()->success('Risk has been successfully updated!');
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
		$risk = Risk::find($id);
		$risk->delete();
		flash()->success('Risk has been successfully deleted!');
		return redirect()->action('ProjectsController@show', $project_id);
	}

}
