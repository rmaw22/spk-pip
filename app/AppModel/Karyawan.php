<?php

namespace App\AppModel;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{   
   
    protected $table = 'students';
    protected $guarded = ['id_karyawan', 'nis','created_at', 'updated_at'];
    protected $primaryKey = 'nis';
    
    public $incrementing = false;
    
    public function hasils()
    {
    	return $this->hasMany('App\AppModel\Hasil');
    }
}
