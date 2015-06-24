<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliverable extends Model {

	//
	protected $fillable = [
		'project_id',
		'submitted',
		'deliverable',
		'required',
		'incharge',
		'condition'
	];

	public function project()
	{
		return $this->belongsTo('App\Project');
	}

}
