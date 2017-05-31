<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
	private $rules = [
		'support' => 'required|accepted'
	];
	
	protected $fillable = ['support'];

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

	public function answer()
	{
		return $this->belongsTo('Answer');
	}
}
