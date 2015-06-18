<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Project;
use Auth;

use Illuminate\Http\Request;

class FiltersController extends Controller {



	public function showManager($id)
	{		
		$managers = User::where('role','Project Manager')->get();
		$projects = Project::where('user_id', $id)->get();

		if ($projects == "[]")
		{
			session()->flash('flash_important', 'There are no projects that match your query!');
			return view('pages.index', compact('projects', 'managers'));
		}

		return view('pages.index', compact('projects', 'managers'));
	}

	public function showColor($color)
	{		
		$managers = User::where('role','Project Manager')->get();
		$projects = Project::where('color', $color)->get();

	
		if ($projects == "[]")
		{
			session()->flash('flash_important', 'There are no projects that match your query!');
			return view('pages.index', compact('projects', 'managers'));
		}
		

		return view('pages.index', compact('projects', 'managers'));
	}

	public function showStatus($status)
	{
		$managers = User::where('role','Project Manager')->get();
		$projects = Project::where('status', $status)->get();

		if ($projects == "[]")
		{
			session()->flash('flash_important', 'There are no projects that match your query!');
			return view('pages.index', compact('projects', 'managers'));
		}

		return view('pages.index', compact('projects', 'managers'));
	}

	public function showMonth($month)
	{	 
		$managers = User::where('role','Project Manager')->get();		

		$projects = [];
		$projects1 = Project::all();
		foreach ($projects1 as $project) 
		{
			if ($project->target_date->month == $month)
			{
				$projects[] = $project;
			}
		}

		if ($projects == null)
		{
			session()->flash('flash_important', 'There are no projects that match your query!');
			return view('pages.index', compact('projects', 'managers'));
		}

		return view('pages.index', compact('projects', 'managers'));
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
	public function showProjMan()
	{
		return 'pogi mo';
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
