<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model {

	//
	protected $fillable = [
		'project_id',
		'issue',
		'status',
		'severity',
		'owner',
		'comment'
	];

	public function project()
	{
		return $this->belongsTo('App\Project');
	}
}
