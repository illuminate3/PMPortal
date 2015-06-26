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
		$this->middleware('system_admin_or_owner',['except' => ['store']]); 		
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
	public function update(CreateExpenseRequest $request, $id)
	{
		$expense = Expense::find($id);
		$input = Request::all();
		$expense->update([
			'item' => $input['item'],
			'amount' => $input['amount'],
			'balance' => $input['balance'],
			'comment' => $input['comment']
			]);

		return redirect()->action('ProjectsController@show', [$expense->project_id]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$expense = Expense::find($id);
		$id = $expense['project_id'];
		$expense->delete();

		return redirect()->action('ProjectsController@show', $id);
	}

}
