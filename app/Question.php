<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	private $rules = [
		'title' = 'required|string|size:200|unique:column',
		'content' = 'required|string|size:1000|',
		'location' = 'alpha_dash|size:100'
	];

	protected $fillable = ['title', 'content', 'location'];

    public function validate()
    {
        $validation = Validator::make($this->attributes, $this->rules);

        if ($validation->passes())
            return true;

        $this->errors = $validation->messages();
        return false;
    }


    public function patient()
	{
		return $this->belongsTo('Patient');
	}
	
	public function media()
	{
		return $this->hasMany('Medium');
	}

	#Follows
	public function users()
	{
		return $this->belongsToMany('User');
	}
}
