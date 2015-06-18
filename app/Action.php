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

	public function project()
	{
		return $this->belongsTo('App\Project');
	}
}
