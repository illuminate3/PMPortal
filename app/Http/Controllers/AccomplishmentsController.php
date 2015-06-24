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
		$this->middleware('system_admin_or_owner');
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
		//
		$input = Request::all();
		$id = $input['project_id'];
		Accomplishment::create([
			'project_id' => $input['project_id'],
			'accomplishment' => $input['accomplishment']
			]);

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
	public function edit($id)
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
	public function update(CreateAccomplishmentRequest $request, $id)
	{
		$accomplishment = Accomplishment::find($id);
		$input = Request::all();
		$accomplishment->update([
			'accomplishment' => $input['accomplishment']
			]);

		return redirect()->action('ProjectsController@show', [$accomplishment->project_id]);	
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
		$accomplishment = Accomplishment::find($id);
		$id = $accomplishment['project_id'];
		$accomplishment->delete();

		return redirect()->action('ProjectsController@show', $id);
	}

}
