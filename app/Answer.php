<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
	private $rules = [
		'content' => 'required|string|size:500'
	];

	protected $fillable = ['content'];

	public function validate()
	{
		$validation = Validator::make($this->attributes, $this->rules);

		if ($validation->passes())
			return true;
		
		$this->errors = $validation->messages();
			return false;
	}

	public function question()
	{
		return $this->belongsTo('Question');
	}

	public function doctor()
	{
		return $this->belongsTo('Doctor');
	}

	public function supports()
	{
		return $this->hasMany('Support');
	}
}
