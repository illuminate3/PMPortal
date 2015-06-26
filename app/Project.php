<?php namespace App;

use Illuminate\Database\Eloquent\Model;

use Auth;

use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\Models\Activity;




class Project extends Model implements LogsActivityInterface
{

	use \Venturecraft\Revisionable\RevisionableTrait;
	use LogsActivity;

	protected $fillable = [
		'cac',
		'title',
		'user_id',
		'pm',
		'status',
		'rationale',
		'color',
		'last_updated',
		'percent',
		'target_start',
		'target_end',
		'actual_start',
		'actual_end',
		'budget',
		'utilization',
		'importance',
		'applicability',
		'target_mandays',
		'actual_mandays',
		'hardware',
		'software'
	];

	protected $revisionEnabled = true;
	//protected $historyLimit = 500; //Stop tracking revisions after 500 changes have been made.

	public static function boot()
    {
        parent::boot();
    }

    protected $keepRevisionOf = array(
    	'title',
		'pm',
		'status',
		'rationale',
		'color',
		'target_date',
		'target_mandays',
		'actual_mandays',
		'hardware',
		'software',
		'updated_at'
	);

    protected $revisionFormattedFieldNames = array(
        'title' => 'Title',
		'pm' => 'Project Manager',
		'status' => 'Status',
		'rationale' => 'Rationale',
		'color' => 'Project Manager',
		
		'target_mandays'  => 'Target Mandays',
		'actual_mandays' => 'Actual Mandays',
		'hardware' => 'Hardware',
		'software' => 'Software'
	);

	//Declaring 'target_date' as a Carbon instance
	//protected $dates = ['target_date'];

	protected $dates = ['target_start', 'target_end', 'actual_start', 'actual_end', 'updated_at'];


	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function accomplishments()
	{
		return $this->hasMany('App\Accomplishment');
	}

	public function actions()
	{
		return $this->hasMany('App\Action');
	}

	public function expenses()
	{
		return $this->hasMany('App\Expense');
	}

	public function issues()
	{
		return $this->hasMany('App\Issue');
	}

	public function milestones()
	{
		return $this->hasMany('App\Milestone');
	}

	public function risks()
	{
		return $this->hasMany('App\Risk');
	}

	public function deliverables()
	{
		return $this->hasMany('App\Deliverable');
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

	    return '-';
	}

	public function getTitle()
	{
		return $this->title;
	}
	public function getType()
	{
		return 'Project';
	}

}
