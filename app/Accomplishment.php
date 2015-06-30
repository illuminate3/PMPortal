<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\Models\Activity;

class Accomplishment extends Model implements LogsActivityInterface{

	use \Venturecraft\Revisionable\RevisionableTrait;
	use LogsActivity;
	
	protected $fillable = [
		'project_id',
		'accomplishment'
	];

	protected $revisionEnabled = true;

	public static function boot()
    {
        parent::boot();
    }

    protected $keepRevisionOf = array(
    	'project_id',
		'accomplishment'
	);

    protected $revisionFormattedFieldNames = array(
		'project_id' => 'Project ID',
		'accomplishment' => 'Name'
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

	    return '';
	}

	public function getTitle()
	{
		return $this->project->title . ' (' . $this->accomplishment . ')';
	}
	public function getType()
	{
		return 'Accomplishment';
	}
}
