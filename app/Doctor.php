<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
	private $rules = [
		'firstName' => 'required|alpha_dash|size:100',
		'lastName' => 'required|alpha_dash|size:100',
		'city' => 'required|alpha_dash|size:100',
		'country' => 'required|elpha_dash|size:100',
		'website' => 'url|size:500',
		'certification' => 'string|size:500'
	]

	protected $fillable = ['firstName', 'lastName', 'city', 'country', 'website', 'certification'];

	public function validate()
	{
		$validation = Validator::make($this->attributes, $this->rules);
		
		if ($validation->passes()) 
			return true;
		
		$this->errors = $validation->messages();
		return false;
	}

    public function user()
    {
    	return $this->hasOne('User');
    }

	public function answers()
	{
		return $this->hasMany('Answer');
	}
}
