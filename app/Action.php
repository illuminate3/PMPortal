<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model {

	//
	protected $fillable = [
		'project_id',
		'action_item',
		'status',
		'owner',
		'target_date',
		'comment'
	];
protected $dates = ['target_date'];
	public function project()
	{
		return $this->belongsTo('App\Project');
	}
}
