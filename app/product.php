<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
    protected $fillable=['photo','name','slug','description','stock','price','category_id','user_id'];
}
