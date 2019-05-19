<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\user');
    }
    protected $fillable=['code','user_id','product_id','qyt','subtotal','name','adddes','portal_code','ekpedisi','paymen'];

    protected $casts=[
        'ekspedisi'=>'array'
    ];

    public function product(){
        return $this->belongsTo('App\product');
    }
}
