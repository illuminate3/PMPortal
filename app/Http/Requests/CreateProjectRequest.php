<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateProjectRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'cac' => 'required|unique:projects',
			'title' => 'required',		
			'target_start' => 'required',
			'target_end' => 'required',
			'target_mandays' => 'required',
			'budget' => 'required',
			'confidentiality' => 'required'
		];
	}

}
