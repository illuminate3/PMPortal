<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectsController;
use App\Project;
use App\Accomplishment;
use App\User;
use App\Http\Requests\CreateAccomplishmentRequest;
use Request;

class AccomplishmentsController extends Controller {

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

		return view('accomplishments.create', compact('project', 'managers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateAccomplishmentRequest $request)
	{
		$input = Request::all();
		$id = $input['project_id'];
		Accomplishment::create([
			'project_id' => $input['project_id'],
			'accomplishment' => $input['accomplishment']
			]);
		flash()->success('Accomplishment has been successfully created!');
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
		$accomplishment = Accomplishment::find($id);
		$managers = User::where('role','Project Manager')->get();

		return view('accomplishments.edit', compact('accomplishment', 'managers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateAccomplishmentRequest $request, $project_id, $id)
	{
		$accomplishment = Accomplishment::find($id);
		$input = Request::all();
		$accomplishment->update([
			'accomplishment' => $input['accomplishment']
			]);
		flash()->success('Accomplishment has been successfully updated!');
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
		$accomplishment = Accomplishment::find($id);
		$accomplishment->delete();
		flash()->success('Accomplishment has been successfully deleted!');
		return redirect()->action('ProjectsController@show', $project_id);
	}

}
