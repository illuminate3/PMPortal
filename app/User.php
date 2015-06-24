<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Auth;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'role'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function projects()
	{
		return $this->belongsToMany('App\Project');
	}

	public function isAProjectManager()
	{
		if ($this->attributes['role'] == 'Project Manager')
		{
			return true;
		}				
		return false;			
	}



	public function isASystemAdministrator()
	{
		if ($this->attributes['role'] == 'System Administrator')
		{
			return true;
		}
		elseif (Auth::guest())
		{
			return false;
		}
		return false;			
	}
	/*
	public function isMine()
	{
		if ($this->attributes['id'] == Auth::user()['id'])
		{
			return true;
		}				
		return false;			
	}
	*/
}
