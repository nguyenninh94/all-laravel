<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','cart','name','address','payment_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
