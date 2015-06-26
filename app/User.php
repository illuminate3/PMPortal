<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Auth;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\Models\Activity;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, LogsActivityInterface{

	use Authenticatable, CanResetPassword;


	use \Venturecraft\Revisionable\RevisionableTrait;
	use LogsActivity;
	//

	public function project()
	{
		return $this->belongsTo('App\Project');
	}

	public function projects()
	{
		return $this->belongsToMany('App\Project');
	}

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

	protected $revisionEnabled = true;

	public static function boot()
    {
        parent::boot();
    }

    protected $keepRevisionOf = array(
    	'name',
		'email',
		'password',
		'role'
	);

    protected $revisionFormattedFieldNames = array(
        'name' => 'Name',
		'email' => 'Email',
		'password' => 'Password',
		'role' => 'Role'
	);



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
		else
		{
			return false;		
		}	
	}

	public function isASystemAdministratorOrProjectManager()
	{
		if (($this->attributes['role'] == 'System Administrator') || ($this->attributes['role'] == "Project Manager"))
		{
			return true;
		}
		elseif (Auth::guest())
		{
			return false;
		}
		return false;			
	}


	public function getActivityDescriptionForEvent($eventName)
	{
	    
	    if ($eventName == 'created')
	    {
	        return 'Created';//return 'Project "' . $this->title . '" was created';
	    }

	    if ($eventName == 'updated')
	    {
	        return 'Updated';//return 'Project "' . $this->title . '" was updated';
	    }

	    if ($eventName == 'deleted')
	    {
	        return 'Deleted';//return 'Project "' . $this->title . '" was deleted';
	    }

	     if ($eventName == 'deleting')
	    {
	        return 'Deleting';//return 'Project "' . $this->title . '" was deleted';
	    }


	    return '-';
	}

	public function getTitle()
	{
		return $this->name;
	}
	public function getType()
	{
		return 'User';
	}
	
}
