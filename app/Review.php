<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	private $rules = [
		'tile' => 'required|string|size:200|unique:column',
		'cost' => 'integer',
		'worth_it' => 'required|in:yes,no,unsure,yet',
		'content' => 'requried|string|size:1000',
		'doctor' => 'alpha_dash|size:200',
		'location' => 'required|alpha_dash|size:100',
		'comment_on_doctor' => 'string|size:500',
		'overall' => 'in:0,1,2,3,4,5',
		'manner' => 'in:0,1,2,3,4,5',
		'answer' => 'in:0,1,2,3,4,5',
		'after_service' => 'in:0,1,2,3,4,5',
		'company' => 'in:0,1,2,3,4,5',
		'responsiveness' => 'in:0,1,2,3,4,5',
		'professionlism' => 'in:0,1,2,3,4,5',
		'transaction' => 'in:0,1,2,3,4,5',
		'waiting' => 'in:0,1,2,3,4,5',
		'deleted' => 'in:0,1,2,3,4,5'
	]

	protected $fillable = ['title', 'cost', 'worth_it', 'content', 'doctor', 'location', 'comment_on_doctor', 'overall', 'manner', 'answer', 'after_service', 'company', 'responsiveness', 'professionlism', 'transaction', 'waiting', 'deleted'];

	public function validate()
	{
		$validation = Validator::make($this->attributes, $this->rules);
		
		if ($validation->passes()) 
			return true;
		
		$this->errors = $validation->messages();
		return false;
	}

    public function procedure()
    {
    	return $this->belongsTo('Procedure');
    }
	
	public function comments()
	{
		return $this->hasMany('Comment');
	}
	
	public function patient()
	{
		return $this->belongsTo('Patient');
	}

	#Likes	
	public function users()
	{
		return $this->belongsToMany('User');
	}
	
	public function media()
	{
		return $this->hasMany('Medium');
	}
}
