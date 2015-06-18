<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model 
{
	protected $fillable = [
		'title',
		'user_id',
		'status',
		'rationale',
		'color',
		'last_updated',
		'target_date',
		'target_mandays',
		'actual_mandays',
		'hardware',
		'software'
	];

	//Declaring 'target_date' as a Carbon instance
	protected $dates = ['target_date'];

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
}
