<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Project extends Model 
{
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

	//Declaring 'target_date' as a Carbon instance
	//protected $dates = ['target_date'];
	protected $dates = ['target_start', 'target_end', 'actual_start', 'actual_end'];

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

}
