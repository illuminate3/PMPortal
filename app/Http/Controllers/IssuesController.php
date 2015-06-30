<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectsController;
use App\Project;
use App\Issue;
use App\User;
use App\Http\Requests\CreateIssueRequest;
use Request;

class IssuesController extends Controller {

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

		return view('issues.create', compact('project', 'managers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateIssueRequest $request)
	{
		//
		$input = Request::all();
		$id = $input['project_id'];
		Issue::create([
			'project_id' => $input['project_id'],
			'issue' => $input['issue'],
			'status' => $input['status'],
			'severity' => $input['severity'],
			'owner' => $input['owner'],
			'comment' => $input['comment']
			]);

		flash()->success('Issue has been successfully created!');
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
		$issue = Issue::find($id);
		$managers = User::where('role','Project Manager')->get();		

		return view('issues.edit', compact('issue', 'managers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateIssueRequest $request, $project_id, $id)
	{
		$issue = Issue::find($id);
		$input = Request::all();
		$issue->update([
			'issue' => $input['issue'],
			'status' => $input['status'],
			'severity' => $input['severity'],
			'owner' => $input['owner'],
			'comment' => $input['comment']
			]);
		flash()->success('Issue has been successfully updated!');
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
		$issue = Issue::find($id);
		$issue->delete();
		flash()->success('Issue has been successfully deleted!');
		return redirect()->action('ProjectsController@show', $project_id);
	}

}
