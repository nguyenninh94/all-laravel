<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provice extends Model
{
    protected $fillable = ['name', 'sortname'];

    public function districts() {
    	return $this->hasMany(District::class);
    }

}
