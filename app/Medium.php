<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
	private $rules = [
		'path' => 'required|string|size:200|unique:column',
		'caption' => 'required|alpha_dash|size:200'
	]
	
	protected $fillable = ['path', 'caption'];

	public function validate()
	{
		$validation = Validator::make($this->attributes, $this->rules);
		
		if ($validation->passes()) 
			return true;
		
		$this->errors = $validation->messages();
		return false;
	}

    public function review()
	{
		return $this->belongsTo('Review');
	}

	pubic function question()
	{
		return $this->belongsTo('Question');
	}
}
