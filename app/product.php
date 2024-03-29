<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $fillable=['photo','name','slug','description','stock','price','weigth','category_id','user_id'];
    public function category(){

        return $this->belongsTo('App\category');
    }
    public function user(){

        return $this->belongsTo('App\user');
    }
}
