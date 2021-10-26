<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
	public $timestamps = false;

	protected $table = 'role_users';
	protected $primaryKey = 'id_user';
	protected $fillable = [
		'id_user', 'id_role'
	];

    	/*
    	* Method untuk yang mendefinisikan relasi antara model user dan model Role
    	*/ 
		// public
		public function users()
		{
			return $this->belongsToMany(User::class, 'id_user');
		}
    	// public function getUserObject()
    	// {
    	// 	return $this->belongsToMany(User::class)->using(UserRole::class);
    	// }
}