<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    //
    protected $fillable=['slug','icon','name','parent_id','user_id'];

    function masterCategory(){
        return $this->hasMany('App\category','parent_id');
    }
    function subCategory(){
        return $this->belongsTo('App\category','parent_id','id');
    }
}
