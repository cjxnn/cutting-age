<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
	private $rules= [
		'location' => 'alpha_dash|size:100'
	];
	
	protected $fillable = ['location'];
	
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

	public function reviews()
	{
		return $this->hasMany('Review');
	}
	
	public function questions()
	{
		return $this->hasMany('Question');
	}

	public function supports()
	{
		return $this->hasMany('Support');
	}
}
