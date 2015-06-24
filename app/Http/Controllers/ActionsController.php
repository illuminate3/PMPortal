<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectsController;
use App\Project;
use App\Action;
use App\User;
use App\Http\Requests\CreateActionRequest;
use Request;

class ActionsController extends Controller {

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
		return view('actions.create', compact('project', 'managers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateActionRequest $request)
	{
		//
		$input = Request::all();
		$id = $input['project_id'];
		Action::create([
			'project_id' => $input['project_id'],
			'action_item' => $input['action_item'],
			'status' => $input['status'],
			'owner' => $input['owner'],
			'comment' => $input['comment'],
			'target_date' => $input['target_date']
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
		$action = Action::find($id);
		$managers = User::where('role','Project Manager')->get();		

		return view('actions.edit', compact('action', 'managers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateActionRequest $request, $id)
	{
		$action = Action::find($id);
		$input = Request::all();
		$action->update([
			'action_item' => $input['action_item'],
			'status' => $input['status'],
			'owner' => $input['owner'],
			'comment' => $input['comment'],
			'target_date' => $input['target_date']
			]);

		return redirect()->action('ProjectsController@show', [$action->project_id]);	
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{		
		$action = Action::find($id);
		$id = $action['project_id'];
		$action->delete();

		return redirect()->action('ProjectsController@show', $id);
	}

}
