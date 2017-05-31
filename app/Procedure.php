<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
	private $rules = [
		'name' => 'required|alpha_dash|size:200|unique:column'
	]    

	public function validate()
	{
		$validation = Validator::make($this->attributes, $this->rules);
		
		if ($validation->passes()) 
			return true;
		
		$this->errors = $validation->messages();
		return false;
	}

	public function reviews()
    {
    	return $this->hasMany('Review');
    }
}
