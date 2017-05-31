i<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	private $rules = [
		'content' => 'required|string|size:500',
		'deleted' => 'required|in:y,n'
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

	public function review()
	{
		return $this->belongsTo('Review');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}
}
