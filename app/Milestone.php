<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model {

	//
	protected $fillable = [
		'project_id',
		'milestone',
		'status',
		'target_date',
		'actual_date'
	];
	protected $dates = ['target_date','actual_date'];

	public function project()
	{
		return $this->belongsTo('App\Project');
	}
}
