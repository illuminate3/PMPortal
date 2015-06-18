<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Risk extends Model {

	//
	protected $fillable = [
		'project_id',
		'risk',
		'impact',
		'probability',
		'mitigation'
	];

	public function project()
	{
		return $this->belongsTo('App\Project');
	}
}
