<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model {

	//
	protected $fillable = [
		'project_id',
		'item',
		'amount',
		'balance',
		'comment'
	];

	public function project()
	{
		return $this->belongsTo('App\Project');
	}
}
