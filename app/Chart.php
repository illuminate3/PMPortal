<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogsActivityInterface;
use Spatie\Activitylog\LogsActivity;
use Spatie\Activitylog\Models\Activity;

class Chart extends Model implements LogsActivityInterface{

	use \Venturecraft\Revisionable\RevisionableTrait;
	use LogsActivity;
	
	protected $fillable = [
		'project_id',
		'project_sponsor',
		'product_owner',
		'project_director',
		'project_manager',
		'audit',
		'group_compliance',
		'business_project_manager',
		'business_analyst',
		'quality_management',
		'it_security',
		'enterprise_architecture',
		'strategic_procurement',
		'technical_project_manager'
	];

	protected $revisionEnabled = true;

	public static function boot()
    {
        parent::boot();
    }

    protected $keepRevisionOf = array(
    	'project_id',
		'project_sponsor',
		'product_owner',
		'project_director',
		'project_manager',
		'audit',
		'group_compliance',
		'business_project_manager',
		'business_analyst',
		'quality_management',
		'it_security',
		'enterprise_architecture',
		'strategic_procurement',
		'technical_project_manager'
	);

    protected $revisionFormattedFieldNames = array(
		'project_id' => 'Project ID',
		'project_sponsor' => 'Project Sponsor',
		'product_owner' => 'Product_Owner',
		'project_director' => 'Project Director',
		'project_manager' => 'Project_Manager',
		'audit' => 'Audit',
		'group_compliance' => 'Group Compliance',
		'business_project_manager' => 'Business Project Manager', 
		'business_analyst' => 'Business Analyst',
		'quality_management' => 'Quality Management',
		'it_security' => 'IT Security',
		'enterprise_architecture' => 'Enterprise Architecture',
		'strategic_procurement' => 'Strategic Procurement',
		'technical_project_manager' => 'Technical Project Manager'
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
		return $this->project->title;
	}
	public function getType()
	{
		return 'Organizational Chart';
	}
}
