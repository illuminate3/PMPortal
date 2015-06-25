<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Project;
use Auth;

use Illuminate\Http\Request;

class FiltersController extends Controller {
	
	public function showManager($name)
	{	
		if (Auth::guest())
			$projects = Project::where('pm',$name)->where('confidentiality','Public')->get();
		else
			$projects = Project::where('pm',$name)->get();
		if ($projects == "[]")
		{
			flash()->error('There are no projects that match your query!');
			return redirect()->action('ProjectsController@index', compact('projects'));
		}
		return view('pages.index', compact('projects'));
	}

	public function showColor($color)
	{		
		if (Auth::guest())
			$projects = Project::where('color',$color)->where('confidentiality','Public')->get();
		else
			$projects = Project::where('color',$color)->get();
		if ($projects == "[]")
		{
			flash()->error('There are no projects that match your query!');
			return redirect()->action('ProjectsController@index', compact('projects'));
		}
		return view('pages.index', compact('projects'));
	}

	public function showStatus($status)
	{
		if (Auth::guest())
			$projects = Project::where('status',$status)->where('confidentiality','Public')->get();
		else
			$projects = Project::where('status',$status)->get();
		if ($projects == "[]")
		{
			flash()->error('There are no projects that match your query!');
			return redirect()->action('ProjectsController@index', compact('projects'));
		}
		return view('pages.index', compact('projects'));
	}

	public function showMonth($month)
	{	 
		$projects = [];
		if (Auth::guest())
			$projects1 = Project::where('confidentiality','Public')->get();
		else
			$projects1 = Project::all();
		foreach ($projects1 as $project) 
		{
			if ($project['target_start']->month == $month)
			{
				$projects[] = $project;
			}
		}
		if ($projects == null)
		{
			flash()->error('There are no projects that match your query!');
			return redirect()->action('ProjectsController@index', compact('projects'));
		}
		return view('pages.index', compact('projects'));
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
