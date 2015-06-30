<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProjectsController;
use App\Project;
use App\Expense;
use App\User;
use App\Http\Requests\CreateExpenseRequest;
use Request;

class ExpensesController extends Controller {

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

		return view('expenses.create', compact('project', 'managers'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateExpenseRequest $request)
	{
		//
		$input = Request::all();
		$id = $input['project_id'];
		Expense::create([
			'project_id' => $input['project_id'],
			'item' => $input['item'],
			'amount' => $input['amount'],
			'balance' => $input['balance'],
			'comment' => $input['comment']
			]);
		flash()->success('Expense has been successfully created!');
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
		$expense = Expense::find($id);
		$managers = User::where('role','Project Manager')->get();		

		return view('expenses.edit', compact('expense', 'managers'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CreateExpenseRequest $request, $project_id, $id)
	{
		$expense = Expense::find($id);
		$input = Request::all();
		$expense->update([
			'item' => $input['item'],
			'amount' => $input['amount'],
			'balance' => $input['balance'],
			'comment' => $input['comment']
			]);
		flash()->success('Expense has been successfully updated!');
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
		$expense = Expense::find($id);
		$expense->delete();
		flash()->success('Expense has been successfully deleted!');
		return redirect()->action('ProjectsController@show', $project_id);
	}

}
