<?php

namespace App\AppModel;

use Illuminate\Database\Eloquent\Model;

class Skala extends Model
{
    protected $guarded = ['id_skala','skala', 'created_at', 'updated_at'];
    protected $primaryKey = 'id';
    protected $fillable = ['id','id_skala','skala', 'created_at', 'updated_at'];

    public function Nilai()
    {
    	return $this->belongsTo('App\AppModel\Nilai');
    }
}
