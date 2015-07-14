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
use App\Http\Requests\CreateProjectRequest;


class DeliverablesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct()
	{
		$this->middleware('owner', ['only' => ['edit','update']]);
		$this->middleware('auth', ['except' => ['show']]);	 	
		$this->middleware('manager', ['except' => ['show']]);	
		$this->middleware('manager_or_member', ['except' => ['edit','update']]);
	
	}

	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		$deliverables = Deliverable::where('project_id', $id)->get();
		$managers = User::where('role','Project Manager')->get();
		$project = Project::find($id);

		return view('deliverables.show', compact('deliverables', 'project', 'managers'));
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
		$deliverables = Deliverable::where('project_id', $id)->get();
		$managers = User::where('role','Project Manager')->get();
		$project = Project::find($id);

		return view('deliverables.edit', compact('deliverables', 'project', 'managers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$deliverables = Deliverable::where('project_id', $id)->get();
		$i = 1;
		$input = Request::all();

		/* Check if $input["submit$i"] checkbox is checked or not */
		foreach($deliverables as $deliverable)
		{
			if (isset($input["submit$i"]))
			{
				$deliverable->update([
					'submitted' => 1
				]);
			}
			else
			{
				$deliverable->update([
					'submitted' => 0
				]);
			}
			$deliverable->update([
				'required' => $input["required$i"],
				'incharge' => $input["incharge$i"],
				'condition' => $input["condition$i"]
				]);
			$i = $i+1;
		}

		return redirect()->action('DeliverablesController@show', [$id]);
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
	}

}
