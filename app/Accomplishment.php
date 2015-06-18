<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Accomplishment extends Model {

	//
	protected $fillable = [
		'project_id',
		'accomplishment'
	];

	public function project()
	{
		return $this->belongsTo('App\Project');
	}
}
