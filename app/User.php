<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

	private $rules = [
		'username' => 'required|string|size:100|unique:column',
		'email' => 'required|email|unique:column',
		'password' => 'required|alpha_num|size:64',
		'photo_path' => 'string|size:200|unique:column',
		'is_doctor' => 'required|in:y,n'
	];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'email', 'photo_path', 'is_doctor'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

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

	public function doctor()
	{
		return $this->belongsTo('Doctor');
	}
	
	public function comments()
	{
		return $this->hasMany('Comment');
	}

	#Likes
    public function reviews()
    {
        return $this->belongsToMany('Review'); 
    }
	
	#Follows
	public function questions()
	{
		return $this->belongsToMany('Question');
	}
}
