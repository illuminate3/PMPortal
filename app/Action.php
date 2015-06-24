<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\Models\Activity;

class Action extends Model implements LogsActivityInterface {

	use \Venturecraft\Revisionable\RevisionableTrait;
	use LogsActivity;

	protected $fillable = [
		'project_id',
		'action_item',
		'status',
		'owner',
		'target_date',
		'comment'
	];

	protected $dates = ['target_date'];

	protected $revisionEnabled = true;

	public static function boot()
    {
        parent::boot();
    }

    protected $keepRevisionOf = array(
    	'project_id',
		'action_item',
		'status',
		'owner',
		'target_date',
		'comment'
	);

    protected $revisionFormattedFieldNames = array(
        'project_id' => 'Project ID',
		'action_item' => 'Name',
		'status' => 'Status',
		'owner' => 'Owner',
		'target_date' => 'Target Date',
		'comment'  => 'Comment'
	);
	
	public function project()
	{
		return $this->belongsTo('App\Project');
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
		return $this->project->title . ' (' . $this->action_item . ')';
	}
	public function getType()
	{
		return 'Action';
	}
}
