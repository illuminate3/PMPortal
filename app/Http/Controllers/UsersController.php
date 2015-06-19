<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use App\User;
use App\Http\Requests;
use Request;
use App\Project;
use Closure;
use Hash;
use Input;
use Validator;

class UsersController extends Controller {


	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->middleware('system_admin');
	}

	public function index()
	{
		$users = User::all();

		return view('users.index', compact('users'));
	}

	public function search()
	{
		$input = Request::all();
		$q = $input['query'];
		$users = User::where('email', 'LIKE', "%$q%" )->get();

		return view('users.results', compact('users'));
	}

	public function show($id)
	{
		$user = User::find($id);
		return view('users.show', compact('user'));
	}

	public function destroy($id)
	{
		$user = User::find($id);
		$projects = Project::where('user_id',$id);

		foreach ($projects as $project)
		{
			$project->users()->detach($user_id);
			$project->save();
		}
		$user->Delete();
		session()->flash('flash_confirmation', 'User account has been successfully deleted!');


		return redirect()->action('UsersController@index');
	}

	public function getUpdateAccount($id)
	{
		$user = User::find($id);
		return view('users.edit', compact('user'));
	}

	public function postUpdateAccount($id)
	{
		$user = User::findOrFail($id);
		$validator = Validator::make(Input::all(),
			array(
				'name' => 'required',		
				'email' => 'required|email|unique:users,email,'.$id,
				'role'=>'required',
				'password' => 'required',
				'old_password' => 'required|min:6',
				'confirm_new_password' => 'required|same:password'
				)
			);
		if($validator->fails())
		{
	   		return redirect()->action('UsersController@getUpdateAccount',$user->id)->withErrors($validator);
		}
		else
		{
			
			$old_password = Input::get('old_password');
			$password = Input::get('password');
			$name = Input::get('name');
			$email = Input::get('email');
			$role = Input::get('role');

			if(Hash::check($old_password, $user->getAuthPassword()))
			{
				$user->password=Hash::make($password);
				$user->name = $name;
				$user->email = $email;
				$user->role = $role;

				if($user->save())
				{
					session()->flash('flash_confirmation', 'User account has been successfully updated!');
	    			return redirect()->action('UsersController@index');
				}
			}
			else
			{
				return redirect()->action('UsersController@getUpdateAccount',$user->id)->withErrors('Your old password is incorrect');
			}
		}
		return redirect()->action('UsersController@getUpdateAccount',$user->id)->withErrors('Your account could not be changed!');
	}
}

