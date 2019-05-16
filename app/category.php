<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $fillable=['slug'];

    function masterCategory(){
        return $this->hasMany('App\category','parent_id');
    }
    function subCategory(){
        return $this->belongsTo('App\category','parent_id','id');
    }
}
